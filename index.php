<?php

// LLAMADA A UNA API PARA SABER QUE PELICULA DE MARVEL SALIRÁ
// HACER LLAMADAS MÁS BÁSICAS A UNA API ES CON CURL SIN INSTALAR DEPENDENCIAS

# CONSTANTE DE LA API
const API_URL = "https://whenisthenextmcufilm.com/api";

# INICIALIZAR UNA NUEVA SESIÓN cURL; ch = cURL handle
$ch = curl_init(API_URL);

# INDICAR QUE QUEREMOS RECIBIR EL RESULTADO DE LA PETICIÓN Y NO MOSTRARLA EN PANTALLA
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

# EJECUTAR LA PETICIÓN Y GUARDAMOS EL RESULTADO
$result = curl_exec($ch);
$data = json_decode($result, true);

curl_close($ch);
?>
<html lang="es">

<head>
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
  <title>La Próxima Película de Marvel</title>
</head>

<body>
  <style>
    :root {
      color-scheme: dark;
    }

    pre {
      text-align: justify;
    }

    section {
      display: flex;
      justify-content: center;
      text-align: center;
    }

    hgroup {
      display: flex;
      flex-direction: column;
      justify-content: center;
      text-align: center;
    }

    img {
      margin: 0 auto;
    }
  </style>

  <main>
    <section>
      <pre style="font-size: 10px;">
          <?php var_dump($data); ?>
        </pre>
    </section>

    <section>
      <img src="<?= $data['poster_url']; ?>" width="300" alt="Poster de <?= $data['title']; ?>" style="border-radius: 16px;">
    </section>

    <hgroup>
      <h2><?= $data['title']; ?> se estrena en <?= $data['days_until']; ?> días.</h2>
    
      <p>Fecha de Estreno: <?= $data['release_date']; ?></p>

      <p>La película siguiente es: <?= $data['following_production']['title']; ?></p>
    </hgroup>
  </main>

</body>
</html>