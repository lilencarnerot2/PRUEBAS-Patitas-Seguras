<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patitas Seguras - Refugio de animales</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>

    <!-- HEADER -->
    <header>
        <div class="logo-container" onclick="scrollToSection('inicio')">
            <div style="background: var(--primary-color); border-radius: 50%; padding: 8px; display: flex; align-items: center; justify-content: center; color: white; font-size: 20px;">
                <i class="fa-solid fa-paw"></i>
            </div>
            <div class="logo-text">
                <h1>PATITAS SEGURAS</h1>
                <span>Refugio de animales</span>
            </div>
        </div>
        <nav>
            <ul>
                <li><a onclick="scrollToSection('inicio')">INICIO</a></li>
                <li><a onclick="scrollToSection('nosotros')">NOSOTROS</a></li>
                <li><a onclick="scrollToSection('adopta')">ADOPTÁ</a></li>
                <li><a onclick="scrollToSection('hogar-de-transito')">HOGAR DE TRÁNSITO</a></li>
                <li><a onclick="openModal('Voluntariado', '¡Gracias por querer sumarte! Dejanos tu mensaje y nos pondremos en contacto para coordinar las actividades.')">SE VOLUNTARIO</a></li>
                <li><a onclick="scrollToSection('ayudar')">CÓMO AYUDAR</a></li>
                <li><a onclick="scrollToSection('contacto')">CONTACTO</a></li>
            </ul>
        </nav>
        <button class="btn-donate" onclick="openModal('Donaciones', '¡Muchas gracias! Podés colaborar mediante transferencia a nuestro alias oficial: PATITAS.SEGURAS.MP o por Mercado Pago.')">
            <i class="fa-solid fa-heart"></i> DONAR
        </button>
    </header>

    <!-- INICIO / HERO -->
    <section id="inicio" class="hero">
        <div class="hero-content">
            <h2>CAMBIÁ UNA VIDA, <span>GANÁ UN AMIGO.</span></h2>
            <p>En Patitas Seguras rescatamos, cuidamos y buscamos un hogar lleno de amor para cada patita que lo necesita.</p>
            <div class="hero-buttons">
                <button class="btn-primary" onclick="scrollToSection('adopta')"><i class="fa-solid fa-paw"></i> ADOPTÁ</button>
                <button class="btn-primary" onclick="scrollToSection('hogar-de-transito')"><i class="fa-solid fa-paw"></i> HOGAR DE TRÁNSITO</button>
                <button class="btn-outline" onclick="openModal('Donaciones', '¡Muchas gracias! Podés colaborar mediante transferencia a nuestro alias oficial: PATITAS.SEGURAS.MP')"><i class="fa-solid fa-heart"></i> DONAR</button>
            </div>
        </div>
        <div class="hero-images">
            <img src="https://images.unsplash.com/photo-1543466835-00a7907e9de1" alt="Perro y gato felices">
        </div>
    </section>

    <!-- TARJETAS PRINCIPALES -->
    <section id="adopta" class="action-cards">
        <div class="card" onclick="openModal('Adopciones', 'Aquí podrás ver el listado completo de perritos y gatitos listos para ser adoptados responsablemente.')">
            <div class="card-body">
                <h3><i class="fa-solid fa-house"></i> ADOPTÁ</h3>
                <p>Dale a un animalito una segunda oportunidad de ser feliz.</p>
            </div>
            <img src="https://images.unsplash.com/photo-1583511655857-d19b40a7a54e" alt="Adoptar cachorro">
            <span class="card-btn">CONOCÉ A LOS RESCATADOS</span>
        </div>
        <div class="card" onclick="openModal('Voluntariado', 'Súmate a paseos, redes sociales o traslados al veterinario.')">
            <div class="card-body">
                <h3><i class="fa-solid fa-hand-holding-heart"></i> SE VOLUNTARIO</h3>
                <p>Tu tiempo y tu amor pueden cambiarles la vida.</p>
            </div>
            <img src="https://images.unsplash.com/photo-1601758228041-f3b2795255f1" alt="Voluntariado">
            <span class="card-btn">SUMATE COMO VOLUNTARIO</span>
        </div>
        <div class="card" onclick="openModal('Hogar de Tránsito', 'Necesitamos hogares temporales mientras encuentran su familia definitiva.')">
            <div class="card-body">
                <h3><i class="fa-solid fa-house-chimney"></i> HOGAR DE TRÁNSITO</h3>
                <p>Abri tu hogar por un tiempo y ayudanos a salvar más vidas.</p>
            </div>
            <img src="https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba" alt="Hogar de transito">
            <span class="card-btn">MÁS INFO</span>
        </div>
    </section>

    <!-- ESTADÍSTICAS -->
    <section>
        <div class="stats-container">
            <div class="stat-item">
                <h4><i class="fa-solid fa-paw" style="font-size: 16px;"></i> +1200</h4>
                <p>Rescates realizados</p>
            </div>
            <div class="stat-item">
                <h4><i class="fa-solid fa-heart" style="font-size: 16px;"></i> +980</h4>
                <p>Adopciones felices</p>
            </div>
            <div class="stat-item">
                <h4><i class="fa-solid fa-house" style="font-size: 16px;"></i> +150</h4>
                <p>Hogares de tránsito</p>
            </div>
            <div class="stat-item">
                <h4><i class="fa-solid fa-users" style="font-size: 16px;"></i> +200</h4>
                <p>Voluntarios activos</p>
            </div>
        </div>
    </section>

    <!-- NOSOTROS -->
    <section id="nosotros">
        <div style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
            <h3 style="color: var(--primary-color); margin-bottom: 15px; font-size: 24px;">SOBRE NOSOTROS</h3>
            <p style="color: #555; line-height: 1.6; font-size: 14px;">Somos un refugio independiente sin fines de lucro. Trabajamos con compromiso y amor para rescatar animales en situación de calle o abandono, brindarles atención veterinaria, alimento y contención, y encontrarles el hogar que merecen.</p>
        </div>
    </section>

    <!-- OTRAS FORMAS DE AYUDAR -->
    <section id="ayudar">
        <h3 style="color: var(--primary-color); margin-bottom: 20px; text-align: center; font-size: 22px;">OTRAS FORMAS DE AYUDAR</h3>
        <div class="other-ways">
            <button class="way-card" onclick="openModal('Donar Alimentos', 'Recibimos alimento balanceado, pipetas, mantas en buen estado y artículos de limpieza.')">
                <i class="fa-solid fa-bowl-food"></i>
                <div>
                    <h5>DONÁ ALIMENTOS</h5>
                    <p>Alimento, mantas, camitas y todo lo que podamos necesitar.</p>
                </div>
            </button>
            <button class="way-card" onclick="openModal('Apadriná', 'El apadrinamiento mensual nos ayuda a sostener los gastos veterinarios fijos de los rescatados.')">
                <i class="fa-solid fa-circle-plus"></i>
                <div>
                    <h5>APADRINÁ</h5>
                    <p>Con tu aporte mensual nos ayudás a cubrir tratamientos y cuidados.</p>
                </div>
            </button>
            <button class="way-card" onclick="openModal('Hacé una Donación', 'Alias: PATITAS.SEGURAS.MP (Mercado Pago). ¡Cada granito de arena cuenta!')">
                <i class="fa-solid fa-circle-dollar-to-slot"></i>
                <div>
                    <h5>HACÉ UNA DONACIÓN</h5>
                    <p>Tu donación nos permite seguir rescatando y cuidando más patitas.</p>
                </div>
            </button>
            <button class="way-card" onclick="openModal('Difundí', 'Compartiendo nuestras publicaciones en redes sociales nos ayudás a llegar a más personas.')">
                <i class="fa-solid fa-share-nodes"></i>
                <div>
                    <h5>DIFUNDÍ</h5>
                    <p>Compartí nuestras historias y ayudanos a encontrarles un hogar.</p>
                </div>
            </button>
        </div>
    </section>

    <!-- FOOTER / CONTACTO -->
    <footer id="contacto">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
            <div>
                <h3>PATITAS SEGURAS</h3>
                <p style="font-size: 12px; color: #ccc;">Refugio de animales</p>
                <div class="social-icons">
                    <a href="https://facebook.com" target="_blank" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://instagram.com" target="_blank" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://tiktok.com" target="_blank" title="TikTok"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>
            <div>
                <p style="font-size: 13px;"><i class="fa-solid fa-phone"></i> 11 2345 6789</p>
                <p style="font-size: 13px; margin-top: 5px;"><i class="fa-solid fa-envelope"></i> hola@patitaseguras.org</p>
                <p style="font-size: 13px; margin-top: 5px;"><i class="fa-solid fa-location-dot"></i> Merlo, Buenos Aires, Argentina</p>
                <p style="font-size: 12px; margin-top: 10px; color: #ccc;">Amor que se nota, huellas que quedan. 🐾</p>
            </div>
        </div>
    </footer>

    <!-- VENTANA MODAL DINÁMICA -->
    <div id="customModal" class="modal-overlay">
        <div class="modal-content">
            <h3 id="modalTitle">Título</h3>
            <p id="modalText">Información</p>
            <button class="close-modal" onclick="closeModal()">Entendido</button>
        </div>
    </div>

    <script>
        function scrollToSection(id) {
            const element = document.getElementById(id);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' });
            }
        }

        function openModal(title, text) {
            document.getElementById('modalTitle').innerText = title;
            document.getElementById('modalText').innerText = text;
            document.getElementById('customModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('customModal').style.display = 'none';
        }
    </script>

</body>
</html>