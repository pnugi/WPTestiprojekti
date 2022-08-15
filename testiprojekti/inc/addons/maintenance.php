<!DOCTYPE html>
<html>

<head>
  <title><?= get_bloginfo(); ?> - <?php froggy_the_string('Huoltotila'); ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel='stylesheet' id='layout-css' href='<?= Mix::version('bundle.css'); ?>' type='text/css' media='all' />
  <style>
    html {
      color: <?php the_field('maintenance_mode_text_color', 'option'); ?>;
      background-color: <?php the_field('maintenance_mode_bg', 'option'); ?>;
    }
  </style>
</head>

<body class="font-body py-8 px-4 text-center">
  <div class="max-w-[850px] mx-auto">
    <?php the_field('maintenance_mode_content', 'option') ?>
  </div>
</body>

</html>
