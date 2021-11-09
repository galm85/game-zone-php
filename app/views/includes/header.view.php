<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="<?=ASSETS?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=ASSETS?>/css/all.min.css">
    
    <title><?=$title?></title>

</head>
<body class="d-flex flex-column min-vh-100">
    <header>
        <?php $this->view('includes/navbar')?>
    </header>
    <main class="flex-fill">
  