class Cube {
    constructor(containerId, options = {}) {
        // Default settings
        const defaults = {
            colorBg: "black",
            colorCube: "orange",
            speedX: 0.01,
            speedY: 0.01,
            speedZ: 0.01,
        };

        // Merge user options with defaults
        this.settings = { ...defaults, ...options };

        // Create canvas
        this.container = document.getElementById(containerId) || document.body;
        this.canvas = document.createElement("canvas");
        this.container.appendChild(this.canvas);
        this.ctx = this.canvas.getContext("2d");

        // Set up sizes
        this.resizeCanvas();
        window.addEventListener("resize", () => this.resizeCanvas());

        // Initialize cube properties
        this.cx = this.canvas.width / 2;
        this.cy = this.canvas.height / 2;
        this.cz = 0;
        this.size = this.canvas.height / 4;

        this.vertices = [
            new Cube.Point3D(this.cx - this.size, this.cy - this.size, this.cz - this.size),
            new Cube.Point3D(this.cx + this.size, this.cy - this.size, this.cz - this.size),
            new Cube.Point3D(this.cx + this.size, this.cy + this.size, this.cz - this.size),
            new Cube.Point3D(this.cx - this.size, this.cy + this.size, this.cz - this.size),
            new Cube.Point3D(this.cx - this.size, this.cy - this.size, this.cz + this.size),
            new Cube.Point3D(this.cx + this.size, this.cy - this.size, this.cz + this.size),
            new Cube.Point3D(this.cx + this.size, this.cy + this.size, this.cz + this.size),
            new Cube.Point3D(this.cx - this.size, this.cy + this.size, this.cz + this.size),
        ];

        this.edges = [
            [0, 1], [1, 2], [2, 3], [3, 0], // back
            [4, 5], [5, 6], [6, 7], [7, 4], // front
            [0, 4], [1, 5], [2, 6], [3, 7], // connecting sides
        ];

        // Animation properties
        this.timeLast = 0;
        this.running = false;
    }

    static Point3D(x, y, z) {
        return { x, y, z };
    }

    resizeCanvas() {
        this.canvas.width = window.innerWidth;
        this.canvas.height = window.innerHeight;
    }

    start() {
        if (!this.running) {
            this.running = true;
            requestAnimationFrame(this.loop.bind(this));
        }
    }

    stop() {
        this.running = false;
    }

    loop(timenow) {
        if (!this.running) return;

        // Clear canvas
        this.ctx.fillStyle = this.settings.colorBg;
        this.ctx.fillRect(0, 0, this.canvas.width, this.canvas.height);

        // Calculate time delta
        const timeDelta = timenow - this.timeLast;
        this.timeLast = timenow;

        // Rotate cube
        this.rotateVertices(timeDelta);

        // Draw edges
        this.ctx.strokeStyle = this.settings.colorCube;
        this.ctx.lineWidth = this.canvas.width / 100;
        for (let edge of this.edges) {
            this.ctx.beginPath();
            this.ctx.moveTo(this.vertices[edge[0]].x, this.vertices[edge[0]].y);
            this.ctx.lineTo(this.vertices[edge[1]].x, this.vertices[edge[1]].y);
            this.ctx.stroke();
        }

        requestAnimationFrame(this.loop.bind(this));
    }

    rotateVertices(timeDelta) {
        let angle, dx, dy, dz, x, y, z;

        // Rotate around Z-axis
        angle = timeDelta * 0.01 * this.settings.speedZ * Math.PI * 2;
        for (let v of this.vertices) {
            dx = v.x - this.cx;
            dy = v.y - this.cy;
            x = dx * Math.cos(angle) - dy * Math.sin(angle);
            y = dx * Math.sin(angle) + dy * Math.cos(angle);
            v.x = x + this.cx;
            v.y = y + this.cy;
        }

        // Rotate around X-axis
        angle = timeDelta * 0.01 * this.settings.speedX * Math.PI * 2;
        for (let v of this.vertices) {
            dy = v.y - this.cy;
            dz = v.z - this.cz;
            y = dy * Math.cos(angle) - dz * Math.sin(angle);
            z = dy * Math.sin(angle) + dz * Math.cos(angle);
            v.y = y + this.cy;
            v.z = z + this.cz;
        }

        // Rotate around Y-axis
        angle = timeDelta * 0.01 * this.settings.speedY * Math.PI * 2;
        for (let v of this.vertices) {
            dx = v.x - this.cx;
            dz = v.z - this.cz;
            x = dz * Math.sin(angle) + dx * Math.cos(angle);
            z = dz * Math.cos(angle) - dx * Math.sin(angle);
            v.x = x + this.cx;
            v.z = z + this.cz;
        }
    }
}