<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="<?=ASSETS?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=ASSETS?>/css/all.min.css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- custome css -->
   <link rel="stylesheet" href="<?=ASSETS?>/css/main.css">


   <title><?=$title?></title>

</head>
<body class="d-flex flex-column min-vh-100">
    <header>
        <?php $this->view('includes/navbar')?>
    </header>
    <main class="flex-fill">
  