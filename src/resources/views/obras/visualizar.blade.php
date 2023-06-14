@extends('layouts.public')

@section('content')
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="/landing">Home</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1><?= $obra["nome_empreendimento"] ?></h1>
      <h2><?= $obra["nome_cliente"] ?></h2>
      <a href="#imagens" class="btn-get-started">Ver imagens</a>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <section id="imagens">
      <div class="container" data-aos="fade-up">
        <div class="section-header my-5">
          <h3 class="section-title">Imagens</h3>
        </div>
        <div class="row">
            <img  width="250" src="<?= $obra['imgHorizontal'] ?>" alt="">
            <img  width="250" src="<?= $obra['imgVertical1'] ?>" alt="">
            <img  width="250" src="<?= $obra['imgVertical2'] ?>" alt="">
        </div>

      </div>
    </section>

    <section id="contact">
      <div class="container">
        <div class="section-header my-5">
          <h3 class="section-title">Deixe seu comentário</h3>
            <form method="POST" action="/comentarios/cadastrar" class="w-75 mx-auto">
                <input type="hidden" name="obra_id" value="<?= $obra['id'] ?>" />
                  <div class="row">
                      <div class="form-group col-md-8">
                          <label for="name" class="col-md-4 control-label">Nome</label>

                          <input id="name" type="text" class="form-control" name="nome" required minlength=3>
                      </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-8">
                        <label for="descricao">Seu comentário</label>
                            <textarea class="form-control p-2" id="descricao" rows="3" name="descricao"></textarea>
                        </div>
                  </div>

                  <div class="form-group pt-4">
                      <div class="col-md-12 text-center">
                          <button style="width: 20%;" type="submit" class="btn btn-sm btn-primary mx-1">
                              Enviar comentário
                          </button>
                      </div>
                  </div>
              </form>
        </div>
      </div>

      
    </section><!-- End Contact Section -->

    <section>
        <div class="container">
            <div class="section-header my-5">
            <h3 class="section-title">Comentários</h3>
                <?php foreach($comentarios as $comentario) { ?>
                    <div class="row mb-4 border-bottom">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="d-inline"><?= $comentario["nome"] ?></h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 ">
                                <span class="text-secondary"><?= date("d/m/Y H:i", strtotime($comentario["created_at"])) ?></span>
                                <span class="fw-light text-secondary"> - <?= $comentario["obra"] ?></span>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-sm-12">
                                <p class="text-justify"><?= $comentario["descricao"] ?></p>
                            </div>
                        </div>                           
                    </div>
                <?php } ?>
            </div>
    </section>

  </main><!-- End #main -->

  @endsection