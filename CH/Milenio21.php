<?php
// Conexión a la base de datos
$servername = "SSO Signon";
$username = "jbhe45033595085";
$password = "";
$dbname = "viviendas";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}

// Consulta SQL
$sql = "SELECT datos_viviendas.id, datos_viviendas.nombre, datos_viviendas.descripcion, datos_viviendas.tipo, datos_viviendas.num_habitaciones, datos_viviendas.num_banos, datos_viviendas.ciudad, datos_viviendas.latitud, datos_viviendas.longitud, datos_viviendas.precio, fotos.imagen
        FROM datos_viviendas
        INNER JOIN fotos
        ON datos_viviendas.id = fotos.vivienda_id
        GROUP BY datos_viviendas.id
        ORDER BY datos_viviendas.id DESC";

$resultado = mysqli_query($conn, $sql);

// Cierre de la conexión a la base de datos
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="icon" href="../iconos/milenio21logos/logom21 1.png" />
    <title>千禧 21 地产</title>
  </head>

  <body>
    <div class="ocultar"></div>
    <header>
      <div class="container">
        <a class="logo" href="Milenio21.php"
          ><img
            class="logo-img"
            src="../iconos\milenio21logos/logom21 3.png"
            alt=""
        /></a>
        <div class="menu">
          <ul class="menu-items hidden">
            <li><a href="Milenio21.php">首页</a></li>
            <li><a href="#propiedades">房产</a></li>
            <li><a href="#contacto">联系我们</a></li>
            <li><a href="about.php">关于我们</a></li>
          </ul>
        </div>
        <!--Social media-->
        <div class="redes-sociales">
          <ul>
            <li>
              <a href="https://www.facebook.com/Rgb2023?mibextid=LQQJ4d"
                ><img src="../iconos/facebook.png" alt="Facebook" />
              </a>
            </li>
            <li>
              <a
                href="https://www.tiktok.com/@user4002954376151?_t=8bHrIQuzHAZ&_r=1"
                ><img src="../iconos/tik-tok.png" alt="TikTok"
              /></a>
            </li>
            <li>
              <a href="https://instagram.com/rgbcancun?igshid=YmMyMTA2M2Y="
                ><img src="../iconos/instagram.png" alt="Instagram" />
              </a>
            </li>
            <li>
              <a href="https://youtube.com/@RGBRGB234"
                ><img src="../iconos/youtube.png" alt="Youtube" width="36px" />
              </a>
            </li>
          </ul>
        </div>
      </div>
    </header>
    <!--Content-->
    <div class="language-selector">
      <div class="selected-language">
        <a href="../Milenio21.php"
          ><img src="../iconos/mexico.png" alt="US Flag"
        /></a>
        <a href="../FR/Milenio21.php"
          ><img src="../iconos/francia (1).png" alt="French Flag"
        /></a>
        <a href="../EN/Milenio21.php"
          ><img src="../iconos/estados-unidos.png" alt="Chinese Flag"
        /></a>
      </div>
    </div>
    <div class="whatsapp">
      <div class="selected-whattsapp">
        <a href="https://wa.me/529984596417"
          ><img src="../iconos/whatsapp-64.png" alt="whatsapp" width="50px"
        /></a>
      </div>
    </div>
    <div class="video-background">
      <video class="fondo" autoplay muted loop id="myVideo">
        <source src="../imagenes/iStock-1322217829.mp4" type="video/mp4" />
      </video>
      <div class="search-container">
        <select id="location" onchange="redirectToLink()">
          <option value="" disabled selected hidden>位置</option>
          <option value="Cancun">坎昆</option>
          <option value="Playa Del Carmen">卡门海滩</option>
          <option value="Tulum">图卢姆</option>
          <option value="Akumal">阿库马尔</option>
          <option value="Puerto Morelos">莫雷洛斯港</option>
          <option value="Cozumel">科苏梅尔</option>
          <option value="Merida">梅里达</option>
          <option value="Isla Mujeres">女人岛</option>
          <option value="Holbox">霍尔博克斯</option>
          <option value="Puerto Progreso">端口进度</option>
          <option value="Puerto Vallarta">巴亚尔塔港</option>
          <option value="Cabo San Lucas">卡波圣卢卡斯</option>
        </select>
        <select id="status" onchange="redirectToLink()">
          <option value="" disabled selected hidden>物业类型</option>
          <option value="Departamento">公寓</option>
          <option value="Casa">独栋别墅</option>
          <option value="Condominio"> 公寓楼</option>
          <option value="Apartaestudio">工作室公寓</option>
          <option value="Duplex"> 复式公寓</option>
          <option value="Penthouse"> 顶层公寓</option>
          <option value="Terreno"> 土地</option>
          <option value="Edificio"> 建筑物</option>
        </select>
        <select id="bedrooms" onchange="redirectToLink()">
          <option value="" disabled selected hidden>房间</option>
          <option value="1">1 - 2</option>
          <option value="2">2 - 3</option>
          <option value="3">3 - 4</option>
          <option value="4">4 - 5</option>
          <option value="5">+5</option>
        </select>
        <select id="bathrooms" onchange="redirectToLink()">
          <option value="" disabled selected hidden>浴室</option>
          <option value="1">1 - 2</option>
          <option value="2">2 - 3</option>
          <option value="3">3 - 4</option>
          <option value="4">4 - 5</option>
          <option value="5">+5</option>
        </select>
        <select id="price" onchange="redirectToLink()">
          <option value="" disabled selected hidden>价格</option>
          <option value="1Million">1,000,000-1,999,999</option>
          <option value="2Milliones">2,000,000-2,999,999</option>
          <option value="3Milliones">3,000,000-3,999,999</option>
          <option value="4Milliones">4,000,000-4,999,999</option>
          <option value="5Millones">5.000.000-9.999.999</option>
          <option value="10Millones">10.000.000-19.999.999</option>
          <option value="20Millones">20.000.000-50.000.000</option>
        </select>
      </div>
      <div class="video-overlay">
        <p>坎昆，卡门海滩，阿库马尔，图卢姆，莫雷洛斯港</p>
      </div>
    </div>
    <a name="propiedades"></a>
    <h1 class="tituloPropiedades">特性</h1>
    <section class="properties">
    <?php
    // Muestra de la información
    while ($fila = mysqli_fetch_assoc($resultado)) {
      $valor = "";
      if ($fila['precio'] > 100000 && $fila['precio'] < 2000000) {
        $valor = "1Millon";
      } else if ($fila['precio'] > 2000000 && $fila['precio'] < 3000000) {
        $valor = "2Millones";
      }
      if ($fila['precio'] > 3000000 && $fila['precio'] < 4000000) {
        $valor = "3Millones";
      } else if ($fila['precio'] > 4000000 && $fila['precio'] < 5000000) {
        $valor = "4Millones";
      } else if ($fila['precio'] > 5000000 && $fila['precio'] < 10000000) {
        $valor = "5Millones";
      } else if ($fila['precio'] > 10000000 && $fila['precio'] < 20000000) {
        $valor = "10Millones";
      } else if ($fila['precio'] > 20000000 && $fila['precio'] < 50000000) {
        $valor = "20Millones";
      }

      // Texto a traducir
      $textoNombre = $fila['nombre'];
      $textoDescripcion = $fila['descripcion'];
      
      // Idiomas de destino
      $idiomasDestino = array("en", "fr", "zh");
      
      // Array para almacenar las traducciones de nombre y descripción
      $traduccionesNombre = array();
      $traduccionesDescripcion = array();
      
      // Realiza la solicitud de traducción para cada idioma
      foreach ($idiomasDestino as $idioma) {
          // URL de la API de Google Translate
          $url = "https://translation.googleapis.com/language/translate/v2?key=AIzaSyBMTvHc9OcxTmJHJ5_h3d85ugdArZQdRTw";
      
          // Configura los datos de la solicitud para el nombre
          $datosNombre = array(
              "q" => $textoNombre,
              "source" => "es",
              "target" => $idioma,
              "format" => "text"
          );
      
          // Realiza la solicitud POST a la API de Google Translate para el nombre
          $chNombre = curl_init();
          curl_setopt($chNombre, CURLOPT_URL, $url);
          curl_setopt($chNombre, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($chNombre, CURLOPT_POSTFIELDS, http_build_query($datosNombre));
          $respuestaNombre = curl_exec($chNombre);
          curl_close($chNombre);
      
          // Decodifica la respuesta JSON para el nombre
          $traduccionNombre = json_decode($respuestaNombre, true);
      
          // Extrae el texto traducido para el nombre
          $textoTraducidoNombre = $traduccionNombre["data"]["translations"][0]["translatedText"];
      
          // Almacena la traducción del nombre en el array
          $traduccionesNombre[$idioma] = $textoTraducidoNombre;
      
          // Configura los datos de la solicitud para la descripción
          $datosDescripcion = array(
              "q" => $textoDescripcion,
              "source" => "es",
              "target" => $idioma,
              "format" => "text"
          );
      
          // Realiza la solicitud POST a la API de Google Translate para la descripción
          $chDescripcion = curl_init();
          curl_setopt($chDescripcion, CURLOPT_URL, $url);
          curl_setopt($chDescripcion, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($chDescripcion, CURLOPT_POSTFIELDS, http_build_query($datosDescripcion));
          $respuestaDescripcion = curl_exec($chDescripcion);
          curl_close($chDescripcion);
      
          // Decodifica la respuesta JSON para la descripción
          $traduccionDescripcion = json_decode($respuestaDescripcion, true);
      
          // Extrae el texto traducido para la descripción
          $textoTraducidoDescripcion = $traduccionDescripcion["data"]["translations"][0]["translatedText"];
      
          // Almacena la traducción de la descripción en el array
          $traduccionesDescripcion[$idioma] = $textoTraducidoDescripcion;
      }
      
      $nombreChino = $traduccionesNombre["zh"];
      
      $descripcionChino = $traduccionesDescripcion["zh"];
      ?>
      
      <div class="property propertys">
        <a name="<?php echo $fila['ciudad']; ?>"></a>
        <a name="<?php echo $valor; ?>"></a>
        <a name="<?php echo $fila['tipo']; ?>"></a>
        <a name="<?php echo $fila['num_habitaciones']; ?>"></a>
        <a name="<?php echo $fila['num_banos']; ?>"></a>
        <a href="propiedades/propiedad/<?php echo $fila['id']; ?>.php">
          <img class="foto" src="../administrador/base_datos/<?php echo $fila['imagen']; ?>" alt="Imagen de propiedad" />
          <div class="property-details">
            <h3>
              <?php echo $nombreChino; ?>
            </h3>
            <p>
              <?php
              $descripcion = $descripcionChino;
              $max_length = 95;

              if (strlen($descripcion) > $max_length) {
                $descripcion = substr($descripcion, 0, $max_length);
                $last_newline_pos = strrpos($descripcion, "\n");
                if ($last_newline_pos !== false) {
                  $descripcion = substr($descripcion, 0, $last_newline_pos);
                }
                $descripcion .= '...';
              }

              echo $descripcion; ?>
            </p>
            <div class="property-info">
              <p><img src="../iconos/dormitorio.png" alt="" />
                <?php echo $fila['num_habitaciones']; ?> 卧室
              </p>
              <p><img src="../iconos/inodoro.png" alt="" />
                <?php echo $fila['num_banos']; ?> 浴室
              </p>
              <p>
                <img src="../iconos/marcador-de-posicion.png" alt="" />
                <?php echo $fila['ciudad']; ?>
              </p>
              <p>状态：出售</p>
              <p>
                <img src="../iconos/signo-de-dolar.png" alt="" /> 价格: $
                <?php echo number_format($fila['precio'], 0, ',', '.'); ?> MXN
              </p>
            </div>
          </div>
        </a>
      </div>
      <?php
    } ?> 
    </section>
    <div id="viviendas-container"></div>
    <div class="MexicoLindo">
      <h1 class="Conoce">可爱的</h1>
      <h1 class="Mexico">墨西哥</h1>
    </div>
    <section class="properties">
      <div id="video-modal1" class="modal">
        <div class="modal-content">
          <span class="close close1">&times;</span>
          <video width="560" height="315" controls>
            <source
              src="../imagenes/videosenespaol/1 lindo playa español.mp4"
              type="video/mp4"
            />
          </video>
        </div>
      </div>
      <div id="video-modal2" class="modal">
        <div class="modal-content">
          <span class="close close2">&times;</span>
          <video width="560" height="315" controls>
            <source
              src="../imagenes/videosenespaol/2 lindo chapultepec español.mp4"
              type="video/mp4"
            />
          </video>
        </div>
      </div>
      <div id="video-modal3" class="modal">
        <div class="modal-content">
          <span class="close close3">&times;</span>
          <video width="560" height="315" controls>
            <source
              src="../imagenes/videosenespaol/4 lindo Cancun infraestructura.mp4"
              type="video/mp4"
            />
          </video>
        </div>
      </div>
      <div id="video-modal4" class="modal">
        <div class="modal-content">
          <span class="close close4">&times;</span>
          <video width="560" height="315" controls>
            <source
              src="../imagenes/videosenespaol/5 lindo akumal español.mp4"
              type="video/mp4"
            />
          </video>
        </div>
      </div>
      <div id="video-modal5" class="modal">
        <div class="modal-content">
          <span class="close close5">&times;</span>
          <video width="560" height="315" controls>
            <source
              src="../imagenes/videosenespaol/Mexico lindo veracruz Español.mp4"
              type="video/mp4"
            />
          </video>
        </div>
      </div>
      <div id="video-modal6" class="modal">
        <div class="modal-content">
          <span class="close close6">&times;</span>
          <video width="560" height="315" controls>
            <source
              src="../imagenes/videosenespaol/riviera maya español.m4v"
              type="video/mp4"
            />
          </video>
        </div>
      </div>
      <div id="video-modal7" class="modal">
        <div class="modal-content">
          <span class="close close7">&times;</span>
          <video width="560" height="315" controls>
            <source
              src="../imagenes/videosenespaol/3 lindo angel español.mp4"
              type="video/mp4"
            />
          </video>
        </div>
      </div>
      <div class="property property1">
        <a name="PlayaCarmen"></a>
        <img
          class="foto"
          src="../imagenes/Playa_del_Carmen_in_Mexico_(29725304248).jpg"
          alt="房产图片"
        />
        <div class="property-details">
          <h3 style="color: red">卡门海滩</h3>
        </div>
      </div>
      <div class="property property2">
        <a name="Chapultepec"></a>
        <img
          class="foto"
          src="../imagenes/Lago-Chapultepec.jpg"
          alt="房产图片"
        />
        <div class="property-details">
          <h3 style="color: darkgreen">查普尔特佩克</h3>
        </div>
      </div>
      <div class="property property3">
        <a name="Cancun"></a>
        <img class="foto" src="../imagenes/cancun.jpg" alt="房产图片" />
        <div class="property-details">
          <h3 style="color: darkmagenta">坎昆</h3>
        </div>
      </div>
      <div class="property property4">
        <a name="Akumal"></a>
        <img class="foto" src="../imagenes/akumal-turtles.jpg" alt="房产图片" />
        <div class="property-details">
          <h3 style="color: deepskyblue">艾库马尔</h3>
        </div>
      </div>
      <div class="property property5">
        <a name="Veracruz"></a>
        <img class="foto" src="../imagenes/veracruz.jpg" alt="房产图片" />
        <div class="property-details">
          <h3 style="color: chocolate">韦拉克鲁斯</h3>
        </div>
      </div>
      <div class="property property6">
        <a name="Maya"></a>
        <img
          class="foto"
          src="../imagenes/zona-arqueologica-detulum.jpg"
          alt="房产图片"
        />
        <div class="property-details">
          <h3 style="color: darkolivegreen">玛雅里维埃拉</h3>
        </div>
      </div>
      <div class="property property7">
        <a name="Mexico"></a>
        <img
          class="foto"
          src="../imagenes/bandera-Mexico-1200x675-1.jpeg"
          alt="房产图片"
        />
        <div class="property-details">
          <h3 style="color: green">美丽的墨西哥</h3>
        </div>
      </div>
    </section>
    <a name="contacto"></a>
    <section class="ZonaDeContacto">
      <form
        action="https://formsubmit.co/mexicanrealtyhomes@gmail.com"
        method="POST"
      >
        <h2>聯繫我們</h2>
        <label for="name">姓名:</label>
        <input type="text" id="name" name="name" required />

        <label for="phone">電話:</label>
        <input type="number" id="phone" name="phone" required />

        <label for="email">電子郵件:</label>
        <input type="email" id="email" name="email" required />

        <label for="message">訊息:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <input type="submit" value="Enviar" />

        <input type="hidden" name="_next" value="Milenio21.html" />
        <input type="hidden" name="_captcha" value="false" />
      </form>
    </section>
    <a name="Certificados"></a>
    <section id="logos">
      <div class="container">
        <div class="logo-list">
          <img
            class="logo1"
            src="../iconos/logosasociados/MATRICULA.jpg"
            alt="Logo 1"
          />
          <img src="../iconos/logosasociados/CertificadoI.png" alt="Logo 1" />
          <img
            src="../iconos/logosasociados/5.png"
            alt="Logo 2"
            width="300px"
          />
          <img src="../iconos/logosasociados/3.png" alt="Logo 3" />
          <img src="../iconos/logosasociados/AMPI.png" alt="Logo 4" />
          <img src="../iconos/logosasociados/CREA.jpg" alt="Logo 5" />
          <!-- Agrega más logotipos aquí -->
        </div>
      </div>
    </section>

    <footer>
      <div class="footer-content">
        <div class="contacto">
          <h3>聯繫方式</h3>
          <p>
            <i class="fas fa-envelope"></i> mexicanrealtyhomes@gmail.com <br />
            rgbvegas@gmail.com
          </p>
          <p><img src="../iconos/mexico.png" alt="" /> +52 99 84 59 64 17</p>
          <p>
            <img src="../iconos/estados-unidos (1).png" alt="" /> +1 702 219 69
            11
          </p>
          <p>
            <i class="fas fa-map-marker-alt"></i> 墨西哥坎昆Quintana Roo 77536
          </p>
        </div>
      </div>
      <div class="copyrigth">
        <p>&copy; 2023 Milenio 21 Realty. 保留所有權利.</p>
      </div>
    </footer>
    <script src="script.js"></script>
  </body>
</html>