
        <!-- Sidebar -->

        <div id="main">
            <div id="container">
                <div class="user" style="display: flex;color: #000000;max-width: 118vh;height: 400px;font-size: 1rem;align-items: center;margin: 90px auto;margin-left: 80px; padding: 3rem;">
                <div class="mb-user" style="height: 340px;border: 1px solid #000000;box-shadow: 0 0 10px rgb(0, 0, 0, 0.5);">
                   <div class="img" style="margin: 1rem;width: 250px;height: 150px;border-bottom: 1px solid #000000;text-align: center;">
                        <img width="120px" src="<?= base_url('/assets/img/profile.jpeg')?>" alt="profile">
                   </div>
                    <div class="ops" style="height: 80px; float: left;">
                        <ul>
                            <li><a href="">Panduan Penggunaan</a></li>
                            <li><a href="">Peraturan Penggunaan</a></li>
                        </ul>
                    </div>

                </div>
                <div class="dt-user" style="width: 550px;height: 340px;margin: 5rem;padding: 1rem;border: 1px solid #000000;box-shadow: 0 0 10px rgb(0, 0, 0, 0.5);">
                    <div class="mb-dt" style="padding: 4px;">
                        <label style="display: flex; color: #000000;" for="name" class="label-form">Nama </label>
                        <input style="background-color: #eaeaea; width: 490px;" type="text" class="form-type" name="name" value="<?= $User['nama'] ?>" size="50" maxlength="50" readonly/>
                    </div>
                    <div class="mb-dt" style="padding: 4px;">
                        <label style="display: flex; color: #000000;" for="email" class="label-form">Email </label>
                        <input style="background-color: #eaeaea; width: 490px;" type="text" class="form-type" name="email" value="<?= $User['email'] ?>"   id="email" size="50" maxlength="50" readonly/>
                    </div>
                    <div class="mb-dt" style="padding: 4px;">
                        <label style="display: flex; color: #000000;" for="id_role" class="label-form">Alamat </label>
                        <input style="background-color: #eaeaea; width: 490px;" type="text" class="form-type" name="id_role" value="<?= $User['alamat'] ?>" id="id_role" size="50" maxlength="50" readonly/>
                    </div>
                    <div class="mb-dt" style="padding: 4px;">
                        <label style="display: flex; color: #000000;" for="date_created" class="label-form">Date Created</label>
                        <input style="background-color: #eaeaea; width: 490px;" type="text" class="form-type" name="date_created" value="<?= $User['tanggal_input'] ?>" id="date_created" size="50" maxlength="50" readonly/>
                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>
    
