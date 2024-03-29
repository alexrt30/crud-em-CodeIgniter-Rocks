<?= $session->getFlashdata("message") ?>

<script>
    $(document).ready(() => {

        /* config fields to update/delete a user */
        edit = (user) => {

            $("#text-edit-user").text("Edit " + ($(user).attr("username")));
            $("#edit-name").val(($(user).attr("username")));
            $("#edit-age").val(($(user).attr("userage")));
            $("#edit-email").val(($(user).attr("useremail")));
            $("#edit-id").val(($(user).attr("userid")));
            $("#btn-delete").attr("href", "/users/delete/" + $(user).attr("userid"));

        }

    })
</script>

<form method = "post" action = "/users/create">
    <div class="modal" tabindex="-1" role="dialog" id = "add-user">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title light-dark "><b>Adcionar novo usuario</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
                <div class = "form-group">
                    <label class = "light-dark">Nome</label>
                    <input class = "form-control" name = "name" required placeholder = "Ex: Alex marques">
                </div>
                <div class = "form-group">
                    <label class = "light-dark">Idade</label>
                    <input class = "form-control" name = "age" required type = "number">
                </div>
                <div class = "form-group">
                    <label class = "light-dark">E-mail</label>
                    <input class = "form-control" name = "email" required type = "email" placeholder = "Example: Alex@marques.com">
                </div>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>Cancelar</b></button>
            <button type="submit" class="btn btn-success"><b>Inserir <i class = "fas fa-check-double icon"></i></b></button>
        </div>
        </div>
    </div>
    </div>
</form>

<form method = "post" action = "/users/update">
<input type = "hidden" name = "id" id = "edit-id">
<div class="modal" tabindex="-1" role="dialog" id = "edit-user">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title light-dark" id = "text-edit-user"><b></b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
                <div class = "form-group">
                    <label class = "light-dark">Nome</label>
                    <input class = "form-control" name = "name" required placeholder = "Ex: Alex" id = "edit-name">
                </div>
                <div class = "form-group">
                    <label class = "light-dark">Idade</label>
                    <input class = "form-control" name = "age" required type = "number" id = "edit-age">
                </div>
                <div class = "form-group">
                    <label class = "light-dark">E-mail</label>
                    <input class = "form-control" name = "email" required type = "email" placeholder = "Examplo: alex@marques.com" id = "edit-email">
                </div>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>Cancelar</b></button>
            <a id = "btn-delete"><button type = "button" class="btn btn-danger"><b>Deletar <i class = "fas fa-info icon"></i></b></button></a>
            <button type="submit" class="btn btn-success"><b>Atualizar <i class = "fas fa-check-double icon"></i></b></button>
        </div>
        </div>
    </div>
</div>
</form>

<div class = "margin-top row">
    <div class = "col-md-3 center">
        <h3 class = "light-dark">Users</h3>
    </div>
    <div class = "col-md-3 center">
        <button class = "btn btn-info" data-toggle = "modal" data-target = "#add-user"><b>Adcionar uauario<i class = "fas fa-plus icon"></i></b></button>
    </div>
</div>

<div class = "margin-top">
    <table class = "table table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>idade</th>
                <th>E-mail</th>
                <th>Edita</th>
            </tr>  
        </thead>

        <tbody>
        <?php foreach($users as $user) : ?>
            <tr>
                <td><?= $user->name?></td>
                <td><?= $user->age?></td>
                <td><?= $user->email?></td>
                <td>
                    <button userage = "<?= $user->age ?>" useremail = "<?= $user->email ?>" username = "<?= $user->name ?>" userid = "<?= $user->id ?>" onclick = "edit(this)" data-toggle = "modal" data-target = "#edit-user" class = "btn btn-sm btn-primary"><b><i class = "fas fa-bars"></i></b></button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

