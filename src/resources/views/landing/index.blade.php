@extends('layouts.public')

@section('content')
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Sobre nós</a></li>
          <li><a class="nav-link scrollto" href="#services">Obras</a></li>
          <li><a class="nav-link scrollto" href="#contact">Faça seu orçamento</a></li>
          <li><a class="nav-link scrollto" href="/painel">Acesse o painel</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1>EcoLife</h1>
      <h2>Construções modernas e ecológicas</h2>
      <a href="#about" class="btn-get-started">Saiba mais</a>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">
        <div class="row about-container">

          <div class="col-lg-6 content order-lg-1 order-2">
            <h2 class="title">Um pouco sobre nós</h2>
            <p><?= $landing["quemSomos"] ?></p>
          </div>

          <div class="col-lg-6 background order-lg-2 order-1" data-aos="fade-left" data-aos-delay="100"></div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services">
      <div class="container" data-aos="fade-up">
        <div class="section-header mb-5">
          <h3 class="section-title">Obras realizadas</h3>
        </div>
        <div class="row">
          <?php foreach($obras as $obra) { ?>
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" style="cursor:pointer;">
              <div class="box">
                <a href="/obras/visualizar/<?= $obra['id'] ?>">
                <div class="icon"><i class="bi bi-briefcase"></i></div>
                <h4 class="title"><?= $obra["nome_empreendimento"] ?></h4>
                <img  width="250" src="<?= $obra['imgHorizontal'] ?>" alt="">
              </a>
              </div>
          </div>
          <?php } ?>
          
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact">
      <div class="container">
        <div class="section-header">
          <h3 class="section-title">Faça seu orçamento</h3>
            <form method="POST" action="/orcamentos/solicitar">
                  <div class="row">
                      <div class="form-group col-md-8">
                          <label for="name" class="col-md-4 control-label">Nome/Razão Social</label>

                          <input id="name" type="text" class="form-control" name="nomeRazao" required autofocus minlength=3>
                      </div>

                      <div class="form-group col-md-4">
                          <label for="cpfCnpj" class="col-md-4 control-label">CPF/CNPJ</label>

                          <input id="cpfCnpj" type="text" class="form-control" name="cpfCnpj" required minlength=11 maxlength=14>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-4">
                          <label for="email" class="col-md-4 control-label">E-mail</label>

                          <input id="email" type="email" class="form-control" name="email" required>
                      </div>

                      <div class="form-group col-md-8">
                          <label for="apelidoFantasia" class="col-md-4 control-label">Apelido/Nome Fantasia</label>

                          <input id="apelidoFantasia" type="text" class="form-control" name="apelidoFantasia" required>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-6">
                          <label for="telefone" class="col-md-4 control-label">Telefone</label>

                          <input id="telefone" type="text" class="form-control" name="telefone" minlength=11 maxlength=11 required>
                      </div>

                      <div class="form-group col-md-6">
                          <label for="cep" class="col-md-4 control-label">CEP</label>

                          <input id="cep" type="text" class="form-control" name="cep" minlength=8 maxlength=8 required>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-4">
                          <label for="tamanho" class="col-md-5 control-label">Tamanho (m²)</label>

                          <input id="tamanho" type="number" class="form-control" name="tamanho" required step=0.01 min=0.1 value=0.1>
                      </div>

                      <div class="form-group col-md-4">
                          <label for="empreendimento" class="col-md-5 control-label">Tipo empreendimento</label>
                          <select id="empreendimento" name="tipo_empreendimento" class="form-control custom-select p-2" required>
                              <?php foreach($tp_empreendimentos as $tp => $tp_descricao) { ?>
                                  <option value="<?= $tp ?>"><?= $tp_descricao ?></option>
                              <?php } ?>
                          </select>
                      </div>

                      <div class="form-group col-md-4">
                          <label for="regioes" class="col-md-3 control-label">Região</label>
                          <select id="regioes" name="regiao" class="form-control custom-select p-2" required>
                              <?php foreach($regioes as $regiao => $regiao_desc) { ?>
                                  <option value="<?= $regiao ?>"><?= $regiao_desc ?></option>
                              <?php } ?>
                          </select>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-4">
                          <label for="CEP" class="col-md-4 control-label">CEP</label>

                          <input id="CEP" type="text" class="form-control" name="cep" required maxlength=9>
                      </div>

                      <div class="form-group col-md-8">
                              <label for="cidade" class="col-md-4 control-label">Cidade</label>

                              <input id="cidade" type="text" class="form-control" name="cidade" required maxlength=150>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-9">
                              <label for="logradouro" class="col-md-4 control-label">Logradouro</label>

                              <input id="logradouro" type="text" class="form-control" name="logradouro" required maxlength=250>
                      </div>

                      <div class="form-group col-md-3">
                          <label for="numero" class="col-md-3 control-label">Número</label>

                          <input id="numero" type="text" class="form-control" name="numero" required maxlength=9>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-6">
                          <label for="palavra_segura" class="col-md-5 control-label">Palavra segura</label>

                          <input id="palavra_segura" type="text" class="form-control" name="palavra_segura" required maxlength=50>
                      </div>
                  </div>

                  <div class="form-group pt-4">
                      <div class="col-md-12 text-center">
                          <button style="width: 20%;" type="submit" class="btn btn-sm btn-primary mx-1">
                              Solicitar orçamento
                          </button>
                      </div>
                  </div>
              </form>
        </div>
      </div>

      
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  @endsection