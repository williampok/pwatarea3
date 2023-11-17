<!-- index.php -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galería de Imágenes</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f8f8f8;
      margin: 0;
      padding: 20px;
      text-align: center;
    }

    h2 {
      color: #333;
    }

    .gallery {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      grid-gap: 20px;
    }

    .gallery img {
      width: 100%;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .gallery img:hover {
      transform: scale(1.05);
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    }
  </style>
</head>
<body>

<h2>Galería de Imágenes</h2>

<div class="gallery">
  <?php
  // Ruta al directorio de imágenes
  $imageDir = 'images/';

  // Obtener la lista de archivos en el directorio de imágenes
  $images = glob($imageDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

  // Mostrar cada imagen en la galería
  foreach ($images as $image) {
      echo '<img src="' . $image . '" alt="Imagen">';
  }
  ?>
</div>

</body>
</html>
