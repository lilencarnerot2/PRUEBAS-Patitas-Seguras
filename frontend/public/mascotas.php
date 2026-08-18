<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mascotas - Patitas Seguras</title>
    <script src="../assets/js/mascotas.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>

    <header>
        <a class="logo-container" href="index.php">
            <div style="background: var(--primary-color); border-radius: 50%; padding: 8px; display: flex; align-items: center; justify-content: center; color: white; font-size: 20px;">
                <i class="fa-solid fa-paw"></i>
            </div>
            <div class="logo-text">
                <h1>PATITAS SEGURAS</h1>
                <span>Refugio de animales</span>
            </div>
        </a>
        <nav>
            <ul>
                <li><a href="index.php">INICIO</a></li>
                <li><a href="mascotas.php" class="active">MASCOTAS</a></li>
                <li><a href="voluntariado.php">VOLUNTARIADO</a></li>
                <li><a href="donaciones.php">DONACIONES</a></li>
            </ul>
        </nav>
        <a class="btn-donate" href="donaciones.php">
            <i class="fa-solid fa-heart"></i> DONAR
        </a>
    </header>

    <section>
        <div class="page-intro">
            <h2>Encontrá a tu compañero ideal</h2>
            <p>Conocé a nuestros rescatados y elegí cómo querés ayudarlos: con una adopción responsable, ofreciendo un hogar de tránsito o revisando el detalle de cada mascota.</p>
        </div>

        <div class="info-cards">
            <div class="info-card" id="adopcion">
                <h3><i class="fa-solid fa-house"></i> Adopción responsable</h3>
                <p>Adoptar es un compromiso a largo plazo. Te acompañamos en todo el proceso para asegurar el bienestar del animal y de tu familia.</p>
                <ul>
                    <li>Entrevista y evaluación del hogar.</li>
                    <li>Mascotas con control veterinario y desparasitación.</li>
                    <li>Seguimiento posterior a la adopción.</li>
                </ul>
            </div>
            <div class="info-card" id="transito">
                <h3><i class="fa-solid fa-house-chimney"></i> Hogar de tránsito</h3>
                <p>Un hogar temporal permite que un rescatado se recupere en un ambiente cálido mientras encontramos su familia definitiva.</p>
                <ul>
                    <li>Colaboración por un tiempo acordado.</li>
                    <li>El refugio cubre gastos veterinarios acordados.</li>
                    <li>Ideal si no podés adoptar de forma permanente.</li>
                </ul>
            </div>
        </div>
    </section>

    <section id="catalogo" style="padding-top: 0;">
        <div class="catalog-header">
            <h3><i class="fa-solid fa-paw"></i> Mascotas disponibles</h3>
            <span id="catalogo-count">Cargando...</span>
        </div>

        <div id="contenedor-mascotas" class="pet-catalog"></div>
    </section>

    <footer>
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
            <div>
                <h3>PATITAS SEGURAS</h3>
                <p style="font-size: 12px; color: #ccc;">Refugio de animales</p>
            </div>
            <div>
                <p style="font-size: 13px;"><i class="fa-solid fa-envelope"></i> hola@patitaseguras.org</p>
                <p style="font-size: 13px; margin-top: 5px;"><i class="fa-solid fa-location-dot"></i> Merlo, Buenos Aires, Argentina</p>
            </div>
        </div>
    </footer>

</body>
</html>
