@extends ( 'layouts.shop' )

@section ( 'content' )
<div 
    x-data="heroComponent" 
    @mousemove="handleMouseMove($event)" 
    @mouseenter="isHovering = true" 
    @mouseleave="isHovering = false" 
    class="relative h-screen w-full overflow-hidden" 
    :style="{ background: backgroundGradient }"
>
    <canvas 
        x-ref="canvas" 
        class="absolute inset-0 w-full h-full" 
        style="mix-blend-mode: overlay;"
    ></canvas>
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>
    <div class="relative z-10 flex flex-col items-center justify-center h-full text-white">
        <h1 class="text-6xl font-bold mb-4 text-center animate-fade-in-up">
            Aladin Love
        </h1>
        <p class="text-2xl mb-8 text-center animate-fade-in-up animation-delay-300">
            Where magic meets comfort in every stay
        </p>
        <button class="px-8 py-3 bg-white text-gray-900 rounded-full font-semibold text-lg transition-transform transform hover:scale-105 animate-fade-in-up animation-delay-600">
            Book Your Magical Stay
        </button>
    </div>
</div>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('heroComponent', () => ({
            isHovering: false,
            canvas: null,
            context: null,
            ripples: [],
            backgroundGradient: 'linear-gradient(45deg, #FF6B6B, #4ECDC4, #45B7D1)',
            
            init() {
                this.canvas = this.$refs.canvas;
                if (!this.canvas) return;

                this.context = this.canvas.getContext('2d');
                if (!this.context) return;

                this.resizeCanvas();
                window.addEventListener('resize', this.resizeCanvas.bind(this));

                this.animate();
            },
            
            resizeCanvas() {
                this.canvas.width = window.innerWidth;
                this.canvas.height = window.innerHeight;
            },
            
            handleMouseMove(event) {
                if (this.isHovering) {
                    this.addRipple(event.clientX, event.clientY);
                }
            },
            
            addRipple(x, y) {
                this.ripples.push({
                    x,
                    y,
                    radius: 0,
                    alpha: 0.5,
                });
            },
            
            animate() {
                if (!this.context) return;

                this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
                
                this.ripples.forEach((ripple, index) => {
                    ripple.radius += 1;
                    ripple.alpha -= 0.01;

                    this.context.beginPath();
                    this.context.arc(ripple.x, ripple.y, ripple.radius, 0, Math.PI * 2);
                    this.context.strokeStyle = `rgba(255, 255, 255, ${ripple.alpha})`;
                    this.context.stroke();

                    if (ripple.alpha <= 0) {
                        this.ripples.splice(index, 1);
                    }
                });

                requestAnimationFrame(this.animate.bind(this));
            }
        }));
    });
</script>

@endsection