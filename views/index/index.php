<style>
  body {
    background: url("public/img/login-bg.jpg") center center fixed;
  }

  .pad {
    margin-top: 40px;
  }

  .jtback {
    background-image: url("");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>
<div class="jumbotron jumbotron-fluid jtback" style="background: #212529; color: white">
  <div class="container">
    <h1 class="display-4">Jogos</h1>
    <p class="lead">Aqui você encontra as novidades e os melhores preços em games.</p>
  </div>
</div>
<div class="container">
  <section>
    <div class="row">
      <div class="col-sm-12">
        <div class="row" id="linhas">

        </div>
      </div>
    </div>
  </section>
  <section id="sessioncar" class="pad">
    <div class="row">
      <table class="table table-dark" id="tabcompras">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Descricao</th>
            <th scope="col">Valor Un.</th>
            <th scope="col">Quantidade</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody id="tablinhas">

        </tbody>
      </table>

    </div>
    <div class="row justify-content-end">
      <div class="col-md-5">
        <div class="alert alert-dark" role="alert">
          <p>Valor total de: <strong></strong></p>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="R$ 0.00" aria-label="Valor total" aria-describedby="finalizar" id="svalortotal" disabled>
            <div class="input-group-append">
              <button id="finalizar" name="finalizar" type="button" class="btn btn-info">Finalizar Compra</button>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
</div>