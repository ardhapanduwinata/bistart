<div>
    <div class="card-body" style="height: 100%;">
        <h2>User
            <button style="float: right" type="button" class="btn btn-success" data-toggle="modal" data-target="#add_modal">Add Data</button>
        </h2>
        <table class="table">
            <thead class="thead-dark" style="text-align: center">
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID User</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Nama</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody id="table-body"></tbody>
        </table>
    </div>
</div>

<script>
    function loadDoc() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                var data = JSON.parse(this.responseText);

                document.getElementById("table-body").innerHTML = "";
                data.forEach(function (item, index) {
                    document.getElementById("table-body").innerHTML += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.id_user}</td>
                        <td>${item.username}</td>
                        <td>${item.password}</td>
                        <td>${item.nama_user}</td>
                        <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_modal">
                            Edit
                        </button>
                        </td>
                        <td>
                        <button type="button" onclick="deleteDoc(${item.id_user})" class="btn btn-danger" data-toggle="modal">
                            Hapus
                        </button>
                        </td>
                    </tr>
                    `;
                });
            }
        };
        xhttp.open("GET", "http://localhost/bistart/admin/action/user.php?action=all", true);
        xhttp.send();
    }

    function deleteDoc(id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
               loadDoc();
            }
        };

        xhttp.open("GET", "http://localhost/bistart/admin/action/user.php?action=delete&id=" + id, true);
        xhttp.send();
    }

    function updateDoc(id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200) {
                loadDoc();
            }
        };

        xhttp.open("GET", "http://localhost/bistart/admin/action/user,php?action=update&id=" + id, true);
    }

    function addDoc() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200) {
                loadDoc();
            }
        };

        xhttp.open("GET", "http://localhost/bistart/admin/action/user,php?action=add&id=", true);
    }

    loadDoc();
</script>

<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateDoc(${item.id_user})">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <br><h2>Form Tambah Users</h2>
                        <form action="" method="post" name="formTambah">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="re-input-password">Re-Input Password</label>
                                <input type="password" name="reinput_pass" class="form-control" id="re-input-password" placeholder="Re-Input Password">
                            </div>

                            <select name="role">
                                <option>Pilih Role/Akses</option>
                                <option>Admin</option>
                                <option>User</option>
                            </select>
                        </form>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary" onclick="addDoc(${item.id_user})">Save changes</button>
            </div>
        </div>
    </div>
</div>