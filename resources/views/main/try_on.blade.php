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

                //  vẽ ra đường centerX và centerY
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

                // Tính tỉ lệ khuon mặt dựa trên cac diem tren khuon mat
                const canvasWidth = canvasElement.width;
                const canvasHeight = canvasElement.height;
                // Lấy các điểm quan trọng trên khuôn mặt
                const chin = landmarks[152]; // Điểm cằm
                const forehead = landmarks[10]; // Điểm trán
                const leftCheek = landmarks[234]; // Gò má trái
                const rightCheek = landmarks[454]; // Gò má phải
                const leftTemple = landmarks[127]; // Thái dương trái
                const rightTemple = landmarks[356]; // Thái dương phải
                // Xương quai hàm trái
                const leftJaw = landmarks[58];
                // Xương quai hàm phải
                const rightJaw = landmarks[288];

                // Tính chiều dài và chiều rộng khuôn mặt
                const faceWidth = Math.sqrt(
                    Math.pow(rightTemple.x - leftTemple.x, 2) +
                    Math.pow(rightTemple.y - leftTemple.y, 2)
                ) * canvasWidth;

                const faceHeight = Math.sqrt(
                    Math.pow(forehead.x - chin.x, 2) +
                    Math.pow(forehead.y - chin.y, 2)
                ) * canvasHeight;

                // Tính khoảng cách 2 xương hàm
                const jawDistance = Math.sqrt(
                    Math.pow(rightJaw.x - leftJaw.x, 2) +
                    Math.pow(rightJaw.y - leftJaw.y, 2)
                ) * canvasWidth;

                // Tính khoảng cách 2 gò má
                const cheekDistance = Math.sqrt(
                    Math.pow(rightCheek.x - leftCheek.x, 2) +
                    Math.pow(rightCheek.y - leftCheek.y, 2)
                ) * canvasWidth;

                // Tính khoảng cách 2 thái dương
                const templeDistance = Math.sqrt(
                    Math.pow(rightTemple.x - leftTemple.x, 2) +
                    Math.pow(rightTemple.y - leftTemple.y, 2)
                ) * canvasWidth;

                // Tính tỷ lệ chiều dài và chiều rộng
                const ratio = faceHeight / faceWidth;
                // Tính tỷ lệ chiều rộng quai hàm và chiều rộng khuôn mặt
                const jawRatio = jawDistance / faceWidth;
                // Tính tỷ lệ chiều rộng gò má và chiều rộng khuôn mặt
                const cheekRatio = cheekDistance / faceWidth;
                // Tính tỷ lệ chiều rộng thái dương và chiều rộng khuôn mặt
                const templeRatio = templeDistance / faceWidth;

                // Vẽ các điểm chính để kiểm tra, có ghi tên điểm
                // [chin, forehead, leftCheek, rightCheek, leftTemple, rightTemple, leftJaw, rightJaw].forEach((point, index) => {
                //     canvasCtx.beginPath();
                //     canvasCtx.arc(point.x * canvasWidth, point.y * canvasHeight, 5, 0, 2 * Math.PI);
                //     canvasCtx.fillStyle = 'red';
                //     canvasCtx.fill();
                //     canvasCtx.stroke();
                //     canvasCtx.fillText(['Chin', 'Forehead', 'Left Cheek', 'Right Cheek', 'Left Temple', 'Right Temple', 'Left Jaw', 'Right Jaw'][index], point.x * canvasWidth, point.y * canvasHeight);
                //     canvasCtx.stroke();
                //     canvasCtx.closePath();
                // });

                // Xác định hình dạng khuôn mặt dựa trên tỷ lệ ratio, jawRatio, cheekRatio, templeRatio
                let faceShape = '';
                if (ratio > 1.3) {
                    faceShape = 'Mặt Oval => Hợp với kính tròn';
                } else if (ratio >= 1.1 && ratio <= 1.3) {
                    if (jawRatio > 0.78) {
                        faceShape = 'Mặt Vuông => Hợp với kính vuông';
                    } else if (cheekRatio > 0.8) {
                        faceShape = 'Mặt Tròn => Hợp với kính tròn';
                    } else {
                        faceShape = 'Mặt Kim Cương => Hợp với kính vuông';
                    }
                } else if (ratio < 1.1) {
                    if (templeRatio > 0.8) {
                        faceShape = 'Mặt Trái Tim => Hợp với kính tròn';
                    } else if (jawRatio > 0.78) {
                        faceShape = 'Mặt Chữ Nhật => Hợp với kính vuông';
                    } else {
                        faceShape = 'Mặt Tam Giác => Hợp với kính vuông';
                    }
                }

                // Vẽ tên hình dạng khuôn mặt lên canvas
                canvasCtx.font = "20px Arial";
                canvasCtx.fillStyle = "blue";
                canvasCtx.fillText(
                    `Khuôn mặt: ${faceShape}`,
                    canvasWidth / 2 - 100,
                    30
                );


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
