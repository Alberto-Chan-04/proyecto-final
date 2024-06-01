<?php
session_start();
$session = $_SESSION['auth'] ?? false;
require_once('./db.php');
$db = conexion();


$res = mysqli_query($db, 'SELECT * FROM EVENTOS');
$res2 = mysqli_query($db, 'SELECT * FROM EVENTOS');

$msg = $_GET['msg'] ?? false;

// // Verificar si el usuario está autenticado como administrador
// $adminAutenticado = isset($_SESSION['admin']) && $_SESSION['admin'] === true;

// // Verificar si se ha enviado el formulario de inicio de sesión
// if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
//     // Aquí deberías validar las credenciales del usuario (consulta a la base de datos, etc.)
//     // Si las credenciales son válidas, establece la variable de sesión del administrador
//     // Ejemplo ficticio:
//     if ($_POST['usuario'] === 'admin' && $_POST['contrasena'] === 'contraseña_admin') {
//         $_SESSION['admin'] = true;
//         // Redirige a alguna página después del inicio de sesión exitoso
//         header('Location: dashboard.php');
//         exit();
//     } else {
//         // Si las credenciales no son válidas, muestra un mensaje de error
//         $mensajeError = "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TecNM | Campus Mérida</title>
  <link rel="icon" type="image/png" href="imagenes/tecnmicono.ico" />
  <meta name="description" content="Escuela de nivel superior - Instituto Tecnológico de Mérida " />
  <meta name="keywords" content="TecNM, Instituto Tecnológico Nacional de México, Tec, Tecnológico Nacional de México, Tec Merida" />
  <link rel="stylesheet" href="estilos.css" />
  <link rel="stylesheet" href="movil.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/2ee0245f3d.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="funciones.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="responsiveslides.min.js"></script>

  <script>
    if ('<?= $msg ?>') {
      setTimeout(() => {
        alert('<?php echo $msg; ?>');
        window.location.href = 'http://localhost/hackathon'
  
      }, 600);

    }
  </script>

</head>

<body>
  <i class="ir-arriba fas fa-arrow-circle-up fa-2x"></i>

  <header>
    <div class="contenedor_header ancho">
      <a href="https://www.gob.mx/" target="_blank"><img class="logogob_header" src="imagenes/logoheader.svg" alt="" /></a>
      <div class="link_header">
        <a href="https://www.gob.mx/gobierno" target="_blank">Gobierno</a>
        <a href="https://www.participa.gob.mx/" target="_blank">Participa</a>
        <a href="https://datos.gob.mx/" target="_blank">Datos</a>
        <?php if($session):?>
            <a href="admin.php" target="_blank">Administrador</a>
        <?php endif;?>
        
          <a href="<?= $session ? 'cerrar.php' : 'http://localhost/hackathon/login.php' ?>"><?php echo $session ? 'Cerrar Sesión' :'Iniciar Sesión' ?></a>
        
      </div>
    </div>
  </header>
  <div class="contenedor_logos ancho">
    <div id="logossep">
      <figure class="iconoscabecera">
        <a href="#"><img src="imagenes/logo-gob.png" alt="" /></a>
      </figure>
      <figure class="iconoscabecera">
        <a href="#"><img src="imagenes/logo-educacion.png" alt="" /></a>
      </figure>
      <figure class="tnm">
        <a href="#"><img src="imagenes/logo-tecnm.png" alt="" /></a>
      </figure>
      <figure id="tec">
        <a href="https://www.merida.tecnm.mx/" target="_blank"><img src="imagenes/logo_tec.jpg" alt="" /></a>
      </figure>
    </div>
    <div id="correo">
      <a href="#" target="_blank"><img src="imagenes/icono-correo.png" alt="" /></a>
      <a href="#"><img src="imagenes/icono-calendario.png" alt="" /></a>
    </div>
  </div>

  <input id="esconder" type="checkbox" />
  <label for="esconder"><i id="iconomenu" class="fas fa-bars fa-lg"></i></label>
  <nav>
    <ul>
      <li>
        <a href="index.html"><i class="fas fa-home"></i></a>
      </li>
      <li><a href="#">INICIO</a></li>
      <li><a href="#">HACKATHON</a></li>
      <li><a href="#">BASE DEL EVENTO </a></li>
      <li><a href="#">PREMIOS</a></li>
      <li><a href="#">REGISTRO</a></li>
    </ul>
    <a href=""><img class="correo2" src="imagenes/icono-correo.png" alt="" /></a>
    <a href=""><img class="correo2" src="imagenes/icono-calendario.png" alt="" /></a>
  </nav>

  <section class="slidefotostodo">

    <ul class="rslides">
      <li><img src="Imagenes Hackaton/Foto1.jpg" alt=""></li>
      <li><img src="Imagenes Hackaton/Foto2.jpg" alt=""></li>
      <li><img src="Imagenes Hackaton/Foto3.jpg" alt=""></li>
    </ul>

    <div class="encima">
      <div class="filtro_slide">
        <div class="slide_body">
          <img src="LOGO_HACKATHON/logo_blanco.png" alt="" class="slide_img">
          <h1 class="Slider_title">Un paso a la innovacion</h1>
          <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati neque fuga tenetur?</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In at vitae optio quasi, libero expedita modi, sit voluptatibus odio ullam, natus ratione laudantium. Velit, sequi? Debitis nesciunt rem recusandae iste.</p>
        </div>
      </div>

    </div>
  </section>
  <br>

  <section class="contenedor_info ancho margen">

    <div class="slider-Left">
      <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- Slides -->
          <div class="swiper-slide"><img src="imagenes/1200px-Wikimania_hackathon_2.jpg" alt="" class="imag"></div>
          <div class="swiper-slide"><img src="imagenes/Hackaton 3.jpg" alt="" class="imag"></div>
          <div class="swiper-slide"><img src="imagenes/Realizan primer Hackaton.jpg" alt="" class="imag"></div>
          <div class="swiper-slide"><img src="imagenes/workshop-2-640x360.jpg" alt="" class="imag"></div>
          ...
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>
      </div>
    </div>
    <div class="info-Right">
      <div class="right">
        <h1 class="titulo1">INNOVACION</h1>
        <P class="parrafo">Este tipo de reuniones está organizado para profesionales que se dedican
          al desarrollo de aplicaciones digitales, con el objetivo de fomentar un
          entorno colaborativo donde se puedan construir soluciones innovadoras en
          un plazo específico de horas. De esta manera, se busca que los participantes
          aprovechen al máximo su tiempo y trabajen en conjunto para alcanzar las
          metas propuestas.</P>
      </div>
    </div>
  </section>
  <!-- video -->
  <section class="info_video">
    <div class="info_left">
      <div class="info">
        <h1 class="titulo2">
          Que es el Hackathon
        </h1>
        <p class="parrafo2">
          un Hackathon es un evento de innovacion donde
          diferentes personas se reúnen para crear y
          diseñar soluciones a una o mas problrmaticas que
          existen en la solucion actualmente o dentro de una
          empresa u organizacion.
        </p>
        <a href="#" class="btn_azul">Mas Información</a>
      </div>
    </div>
    <div class="video_right">
      <div class="video">
        <video class="repro" src="imagenes/HACKATON DE INNOVACIÓN 2023.mp4" type="video/mp4" controls></video>
      </div>
    </div>
  </section>
  <!--empresas participantes -->
  <section>
    <div class="hack">
      <div class="fondImag">
        <img class="log" src="imagenes/logo_colores.png" alt="">
        <div class="content">
          <div class="text">
            <p class="ts">4</p>
            <p class="ts">main trancks</p>
          </div>
          <div class="text">
            <p class="ts">20</p>
            <p class="ts">mentors</p>
          </div>
          <div class="text">
            <p class="ts">4</p>
            <p class="ts">coding hours</p>
          </div>
          <div class="text">
            <p class="ts">∞</p>
            <p class="ts">solutions</p>
          </div>
        </div>
      </div>
      <div class="slider-center ">
        <!-- Slider main container -->
        <div class="swiper">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide ">
              <img class="imag2" src="imagenes/CodeBrew-Hackathon-Tracks-Challenges4.png" alt="">
              <p class="tss">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum recusandae esse dolore mollitia accusamus? Voluptatem incidunt, officia quasi qui, natus voluptatum atque cupiditate provident inventore voluptate eligendi facilis, cum eius!</p>
            </div>
            <div class="swiper-slide">
              <img class="imag2" src="imagenes/CodeBrew-Hackathon-Tracks-Challenges3.png" alt="">
              <p class="tss">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum recusandae esse dolore mollitia accusamus? Voluptatem incidunt, officia quasi qui, natus voluptatum atque cupiditate provident inventore voluptate eligendi facilis, cum eius!</p>
            </div>
            <div class="swiper-slide">
              <img class="imag2" src="imagenes/CodeBrew-Hackathon-Tracks-Challenges2.png" alt="">
              <p class="tss">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum recusandae esse dolore mollitia accusamus? Voluptatem incidunt, officia quasi qui, natus voluptatum atque cupiditate provident inventore voluptate eligendi facilis, cum eius!</p>
            </div>
            <div class="swiper-slide">
              <img class="imag2" src="imagenes/CodeBrew-Hackathon-Tracks-Challenges.png" alt="">
              <p class="tss">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum recusandae esse dolore mollitia accusamus? Voluptatem incidunt, officia quasi qui, natus voluptatum atque cupiditate provident inventore voluptate eligendi facilis, cum eius!</p>
            </div>
          </div>
          <!-- If we need pagination -->
          <div class="swiper-pagination"></div>

          <!-- If we need navigation buttons -->
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>


        </div>
      </div>
    </div>
  </section>
  <br>

  <!--trancks-->
  <section class="Tracks">
    <img class="loc" src="imagenes/logo_colores.png" alt=""><br><br>
    <div class="container">

      <div class="tracks_eventos">
        <?php while($item = mysqli_fetch_assoc($res)):?>
              <?php if($item['vista'] == '1'):?>
          <div class="track">
            <div class="info_track">
              <h3><?php echo $item['nombre_evento'] ?> </h3><br>
              <figure>
                <img width="200" height="200" src="img/<?php echo $item['imagen']?>" alt="">
              </figure>
              <p><?php echo $item['texto'] ?></p> <br>
              <button href="#" class="btn_azul mostrar">Mas Información</button>
            </div>
          </div>
            <?php endif ?>
        <?php endwhile;?>
       
      </div>
    </div>
    <!-- <br>  
    <button id="agregarEvento" class="btn_azul">Agregar Evento</button>
    <button id="editarUltimoEvento" class="btn_azul">Editar Último Evento</button> -->
  </section>
  <br>
  <!--main-->
  <section>
    <main>
      <div class="premios">
        <div class="circulo"><i class="fa-solid fa-trophy"></i></div>
        <div class="recta">
          <h1 class="tit">Primer lugar</h1>
          <p class="tis">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vitae quidem corrupti id eaque quis? Officiis ullam debitis eum consequuntur voluptate minus blanditiis architecto quasi commodi enim, omnis vel aliquam ea!</p>
        </div>
      </div>
      <div class="premios">
        <div class="circulo"><i class="fa-solid fa-trophy"></i></div>
        <div class="recta">
          <h1 class="tit">Segundo lugar</h1>
          <p class="tis">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta itaque voluptates praesentium ea ad asperiores accusantium, autem voluptatibus perferendis nisi assumenda possimus rem nobis harum quidem voluptate libero a quam!</p>
        </div>
      </div>
      <div class="premios">
        <div class="circulo"><i class="fa-solid fa-trophy"></i></div>
        <div class="recta">
          <h1 class="tit">Tercer lugar</h1>
          <p class="tis">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates cum in ducimus libero sit quaerat laudantium architecto nihil, quam voluptatum minima asperiores nulla suscipit repellat placeat inventore blanditiis modi eos!</p>
        </div>
      </div>
    </main>
  </section>
  <br>
 

  <br>
  <footer>
    <div id="direccion">
      <h2>Dirección</h2>
      <p>Av. Tecnológico km. 4.5 S/N C.P. 97118</p>
      <p><a href="tel:9999645000">Tel:(999) 964-5000 Ext. 21801</a> </p>
      <br>
      <p>© Copyright 2024 TecNM - Todos los Derechos Reservados</p>
      <br>
      <p><a href="#"> Aviso de Privacidad</a></p>
    </div>
    <div id="contacto">
      <h2>Contactanos</h2>
      <p> Contacto: <a href="mailto:cisistemas@merida.tecnm.mx">cisistemas@merida.tecnm.mx</a></p>

      <br>

      <div class="iconosredes">
        <a href="https://www.facebook.com/MuroCoorIscItm" target="_blank">
          <span class='fa-stack fa-1x'>
            <i class='fa fa-circle fa-stack-2x'></i>
            <i class='redes fab fa-facebook-f fa-stack-1x fa-inverse'></i>
          </span>
        </a>


      </div>
    </div>

    <iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.5049951470533!2d-89.62216216951138!3d21.012470618822007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f5676a65077d641%3A0x39dfe74777312656!2sInstituto%20Tecnol%C3%B3gico%20de%20M%C3%A9rida!5e0!3m2!1ses-419!2smx!4v1595463545538!5m2!1ses-419!2smx" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </footer>
  <section id="abajo">
    <img id="logoabajo" src="imagenes/logoheader.svg" alt="">

    <article>
      <div id="uno">
        <h2>Enlaces</h2>
        <aside class="enlacesabajo">
          <a href="https://participa.gob.mx/" target="_blank">- Participa</a>
          <a href="https://www.gob.mx/publicaciones" target="_blank">- Publicaciones Oficiales</a>
          <a href="http://www.ordenjuridico.gob.mx/" target="_blank">- Marco Jurídico</a>
          <a href="https://consultapublicamx.inai.org.mx/vut-web/faces/view/consultaPublica.xhtml#inicio" target="_blank">- Plataforma Nacional de Transparencia</a>
        </aside>
      </div>

      <div id="uno">
        <h2>¿Qué es gob.mx</h2>
        <aside class="enlacesabajo">
          <p>Es el portal único de trámites, información y participación ciudadana. <a href="https://www.gob.mx/que-es-gobmx" target="_blank" class="dorado"> Leer más</a></p>
          <a href="https://datos.gob.mx/" target="_blank">- Portal de datos abiertos</a>
          <a href="https://www.gob.mx/accesibilidad" target="_blank">- Declaración de accesibilidad</a>
          <a href="https://www.gob.mx/aviso_de_privacidad" target="_blank">- Aviso de privacidad integral</a>
        </aside>
      </div>

      <div id="uno">
        <aside class="enlacesabajo">
          <a href="https://www.gob.mx/privacidadsimplificado" target="_blank">- Aviso de privacidad simplificado</a>
          <a href="Términos y Condiciones" target="_blank">- Terminos y condiciones</a>
          <a href="https://www.gob.mx/terminos#medidas-seguridad-informacion" target="_blank">- Politica de
            seguridad</a>
          <a href="#" target="_blank">- Mapa del sitio</a>
        </aside>
      </div>
    </article>
  </section>

      <!--modal-->
  <div class="modal">
    <form action="agregar.php" method="POST">
      <button type="button" class="cerrar">x</button>
      <div class="elemento">
        <label for="nombre">Nombre</label>
        <input name="nombre" type="text" placeholder="Ingrese su nombre">
      </div>
      <div class="elemento">
        <label for="matricula">Matricula</label>
        <input name="matricula" type="text" placeholder="Ingrese su matricula">
      </div>
      <div class="elemento">
        <label for="semestre">Semestre</label>
        <input name="semestre" type="text" placeholder="Ingrese su semestre">
      </div>
      <div class="elemento">
        <label for="telefono">telefono</label>
        <input name="telefono" type="text" placeholder="Ingrese su telefono">
      </div>
      <div class="elemento">
        <label for="correo">Correo</label>
        <input name="correo" type="text" placeholder="Ingrese su correo">
      </div>
      <div>
        <label for="evento">Eventos</label>
        <select name="evento" class="select-evento">
          <?php while ($item = mysqli_fetch_assoc($res2)) : ?>
            <option value="<?= $item['id_evento'] ?>"><?= $item['nombre_evento'] ?></option>
          <?php endwhile; ?>
        </select>
      </div>
      <div class="elemento">
        <label for="carrera">Carrera</label>
        <input name="carrera" type="text" placeholder="Ingrese su carrera">
      </div>
      <div class="elemento">
        <input name="" type="submit" value="Agregar">
      </div>
    </form>
  </div>

  <!-- FUNCIONES JAVASCRIPT -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    $(function() {
      $(".rslides").responsiveSlides();
    });
  </script>

  <script>
    //slider
    const swiper = new Swiper('.swiper', {
      // Optional parameters
      direction: 'horizontal',
      loop: true,
      effect: "cubo ",
      autoplay: true,

      // If we need pagination
      pagination: {
        el: '.swiper-pagination',
      },

      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

      // And if we need scrollbar
      scrollbar: {
        el: '.swiper-scrollbar',
      },
    });

    const button = document.querySelectorAll('.mostrar')

    button.forEach(item => {
      item.addEventListener('click', function(e) {
        document.querySelector('.modal').classList.add('mostrar')
      })
    })

    document.querySelector('.cerrar').addEventListener('click', function(e) {
      document.querySelector('.modal').classList.remove('mostrar')
    })
  </script>
  <!-- para el boton de agregar nuevos eventos -->
  <script>
  // Obtener el contenedor de eventos y el botón de agregar evento
//   const contenedorEventos = document.querySelector('.tracks_eventos');
//   const botonAgregarEvento = document.getElementById('agregarEvento');
//   const botonEditarUltimoEvento = document.getElementById('editarUltimoEvento');

//   // Función para agregar un nuevo evento
//   function agregarNuevoEvento() {
//     // Clonar un evento existente
//     const nuevoEvento = contenedorEventos.firstElementChild.cloneNode(true);
//     // Limpiar los campos del nuevo evento
//     nuevoEvento.querySelector('h3').textContent = ''; // Cambia el texto del título si es necesario
//     nuevoEvento.querySelector('p').textContent = ''; // Cambia el texto del párrafo si es necesario
//     // Agregar el nuevo evento al contenedor
//     contenedorEventos.appendChild(nuevoEvento);

//     // Obtener el nombre del nuevo evento
//     const nombreEvento = 'Nuevo Evento'; // Cambia esto con el nombre del evento

//     // Crear una nueva opción para el selector de eventos en el modal
//     const nuevaOpcion = document.createElement('option');
//     nuevaOpcion.value = 'nuevo_evento'; // Puedes asignar un valor único para identificar este evento si es necesario
//     nuevaOpcion.textContent = nombreEvento;

//     // Agregar la nueva opción al selector de eventos en el modal
//     const selectEvento = document.querySelector('.select-evento');
//     selectEvento.appendChild(nuevaOpcion);
//   }

//   // Función para editar el último evento añadido
//   function editarUltimoEvento() {
//     const eventosNuevos = contenedorEventos.querySelectorAll('.track:not(:first-child)'); // Obtener todos los eventos nuevos
//     const ultimoEvento = eventosNuevos[eventosNuevos.length - 1]; // Obtener el último evento añadido

//     const titulo = ultimoEvento.querySelector('h3'); // Obtener el título del evento
//     const parrafo = ultimoEvento.querySelector('p'); // Obtener el párrafo del evento

//     const nuevoTitulo = prompt('Editar título:', titulo.textContent); // Solicitar nuevo título al usuario
//     const nuevoParrafo = prompt('Editar información:', parrafo.textContent); // Solicitar nuevo párrafo al usuario

//     // Actualizar el título y el párrafo con la nueva información
//     if (nuevoTitulo !== null && nuevoParrafo !== null) {
//       titulo.textContent = nuevoTitulo;
//       parrafo.textContent = nuevoParrafo;
//     }
//   }

//   // Agregar un listener al botón para que llame a la función cuando se hace clic
//   botonAgregarEvento.addEventListener('click', agregarNuevoEvento);

//   // Agregar un listener al botón para editar el último evento añadido
//   botonEditarUltimoEvento.addEventListener('click', editarUltimoEvento);
// </script>
</body>

</html>