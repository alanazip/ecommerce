@extends('site.layout')

@section('content')

<div class="container">

  <form method="post">
    @csrf
    <!-- Contact Start -->
    <div class="container-fluid pt-5">
      <div class="container">
        <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
          <h6 class="text-primary text-uppercase">Contate-nos</h6>
          <h1 class="display-5 text-uppercase mb-0">Fique livre para entrar em contato conosco</h1>
        </div>
        @if(session('msg'))
        <p class="msg">{{ session('msg') }}</p>
        <p></p>
        @endif
        <div class="row g-5">
          <div class="col-lg-7">
            <form>
              <div class="row g-3">
                <div class="col-12">
                  <input type="text" name="nome" class="form-control bg-light border-0 px-4" placeholder="Nome" style="height: 55px;">
                </div>
                <div class="col-12">
                  <input type="email" name="email" class="form-control bg-light border-0 px-4" placeholder="E-mail" style="height: 55px;">
                </div>
                <div class="col-12">
                  <input type="text" name="telefone" class="form-control bg-light border-0 px-4" placeholder="Telefone" style="height: 55px;">
                </div>

                <div class="col-12">
                  <textarea name="mensagem" class="form-control bg-light border-0 px-4 py-3" rows="8" placeholder="Mensagem"></textarea>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100 py-3" type="submit">Enviar</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-5">
            <div class="bg-light mb-5 p-5">
              <div class="d-flex align-items-center mb-2">
                <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
                <div class="text-start">
                  <h6 class="text-uppercase mb-1">Nosso escritório</h6>
                  <span>45 Rua Terezina, Presidente Prudente, SP</span>
                </div>
              </div>
              <div class="d-flex align-items-center mb-2">
                <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
                <div class="text-start">
                  <h6 class="text-uppercase mb-1">Mande um e-mail para nós</h6>
                  <span>gal@dominio.com</span>
                </div>
              </div>
              <div class="d-flex align-items-center mb-4">
                <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                <div class="text-start">
                  <h6 class="text-uppercase mb-1">Ligue para nós</h6>
                  <span>+018 99816 8675</span>
                </div>
              </div>
              <div>
              <iframe class="position-relative w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3695.657665198762!2d-51.386429785419196!3d-22.139024416489892!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9493f5012f273467%3A0x28003e31c797e2ba!2sR.%20Teresina%2C%2045%20-%20Vila%20Paulo%20Roberto%2C%20Pres.%20Prudente%20-%20SP%2C%2019046-230%2C%20Brazil!5e0!3m2!1sen!2sbd!4v1670099826740!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->

    @endsection