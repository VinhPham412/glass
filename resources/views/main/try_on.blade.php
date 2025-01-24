<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script
            src="https://cdn.jsdelivr.net/npm/@mediapipe/camera_utils/camera_utils.js"
            crossorigin="anonymous"
    ></script>
    <script
            src="https://cdn.jsdelivr.net/npm/@mediapipe/drawing_utils/drawing_utils.js"
            crossorigin="anonymous"
    ></script>
    <script
            src="https://cdn.jsdelivr.net/npm/@mediapipe/face_mesh/face_mesh.js"
            crossorigin="anonymous"
    ></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
<div class="relative w-screen h-screen">
    <canvas class="absolute inset-0 w-full h-full" width="1280" height="720"></canvas>
    <video class="hidden" width="1280" height="720"></video>
</div>

<script type="module">
    const videoElement = document.getElementsByTagName("video")[0];
    const canvasElement = document.getElementsByTagName("canvas")[0];
    const canvasCtx = canvasElement.getContext("2d");

    // Load images for glasses
    const frontGlassImage = new Image();
    frontGlassImage.src = "{{Storage::url($product->try_on)}}";

    function onResults(results) {
        canvasCtx.save();
        canvasCtx.clearRect(0, 0, canvasElement.width, canvasElement.height);
        canvasCtx.drawImage(
            results.image,
            0,
            0,
            canvasElement.width,
            canvasElement.height
        );

        if (results.multiFaceLandmarks) {
            for (const landmarks of results.multiFaceLandmarks) {
                const leftEye = landmarks[163]; // Approx. left eye corner
                const rightEye = landmarks[249]; // Approx. right eye corner
                const noseBridge = landmarks[6]; // Approx. nose bridge
                const leftEar = landmarks[234]; // Left ear reference
                const rightEar = landmarks[454]; // Right ear reference

                const glassesWidth = Math.sqrt(
                    Math.pow(rightEar.x - leftEar.x, 2) +
                    Math.pow(rightEar.y - leftEar.y, 2)
                ) * canvasElement.width * 1.055;
                const glassesHeight = glassesWidth / 3.3;

                const centerX = noseBridge.x * canvasElement.width;
                const centerY = (noseBridge.y * canvasElement.height) - (glassesHeight * 0.2);

                // Draw front glass
                canvasCtx.drawImage(
                    frontGlassImage,
                    centerX - glassesWidth / 2,
                    centerY - glassesHeight / 2.5,
                    glassesWidth,
                    glassesHeight
                );

                // // vẽ ra đường centerX và centerY
                // canvasCtx.beginPath();
                // canvasCtx.arc(centerX, centerY, 5, 0, 2 * Math.PI);
                // canvasCtx.fillStyle = 'red';
                // canvasCtx.fill();
                // canvasCtx.stroke();
                //
                // //vẽ rightEye dưới dạng chấm đỏ
                // canvasCtx.beginPath();
                // canvasCtx.arc(rightEye.x * canvasElement.width, rightEye.y * canvasElement.height, 5, 0, 2 * Math.PI);
                // canvasCtx.fillStyle = 'yellow';
                // canvasCtx.fill();
                // canvasCtx.stroke();
                //
                // //v�� leftEye dư��i dạng chấm xanh
                // canvasCtx.beginPath();
                // canvasCtx.arc(leftEye.x * canvasElement.width, leftEye.y * canvasElement.height, 5, 0, 2 * Math.PI);
                // canvasCtx.fillStyle = 'blue';
                // canvasCtx.fill();
                // canvasCtx.stroke();
                //
                // // Vẽ noseBridge dưới dạng chấm tím
                // canvasCtx.beginPath();
                // canvasCtx.arc(noseBridge.x * canvasElement.width, noseBridge.y * canvasElement.height, 5, 0, 2 * Math.PI);
                // canvasCtx.fillStyle = 'purple';
                // canvasCtx.fill();
                // canvasCtx.stroke();

                // Vẽ leftEar dưới dạng chấm đen
                // canvasCtx.beginPath();
                // canvasCtx.arc(leftEar.x * canvasElement.width, leftEar.y * canvasElement.height, 5, 0, 2 * Math.PI);
                // canvasCtx.fillStyle = 'black';
                // canvasCtx.fill();
                // canvasCtx.stroke();
                //
                // // Vẽ rightEar dưới dạng chấm trắng
                // canvasCtx.beginPath();
                // canvasCtx.arc(rightEar.x * canvasElement.width, rightEar.y * canvasElement.height, 5, 0, 2 * Math.PI);
                // canvasCtx.fillStyle = 'white';
                // canvasCtx.fill();
                // canvasCtx.stroke();

                // Vẽ số toàn bo điểm trên khuôn mặt tư 1 đến hết
                // for (let i = 0; i < landmarks.length; i++) {
                //     const landmark = landmarks[i];
                //     canvasCtx.font = "10px Arial";
                //     canvasCtx.fillStyle = "green";
                //     canvasCtx.fillText(i, landmark.x * canvasElement.width, landmark.y * canvasElement.height);
                // }


            }
        }

        canvasCtx.restore();
    }

    const faceMesh = new FaceMesh({
        locateFile: (file) => {
            return `https://cdn.jsdelivr.net/npm/@mediapipe/face_mesh/${file}`;
        },
    });
    faceMesh.setOptions({
        maxNumFaces: 1,
        minDetectionConfidence: 0.6,
        minTrackingConfidence: 0.6,
    });
    faceMesh.onResults(onResults);

    const camera = new Camera(videoElement, {
        onFrame: async () => {
            await faceMesh.send({image: videoElement});
        },
        width: 1280,
        height: 720,
    });
    camera.start();
</script>
</body>
</html>
