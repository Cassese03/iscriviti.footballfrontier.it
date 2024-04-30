<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Benvenuto <?php echo $utente->nominativo ?></h1>
                <small>Dashboard Admin </small>
            </div><!-- /.col -->


            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <button onclick="$('#modal_inserisci').modal('show')" class="btn btn-block btn-success btn-flat">
                        Aggiungi
                    </button>
                </ol>
            </div>
            <!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<script src="/IconPicker/dist/iconpicker-1.5.0.js"></script>

<?php // echo date('Y-m-d H:i:s', strtotime('365 days'));?>
        <!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <?php foreach ($group_consigli as $g)  {?>

            <div class="col-md-3 col-sm-6 col-12">
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo $g->title;?></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i
                                        class="fas fa-plus"></i>
                            </button>
                        </div>

                    </div>


                    <div class="card-body">
                        <div class="form-group" style="margin-top: -10%">
                            <label class="col-form-label" for="inputSuccess"></label>

                            <div style="display: flex">
                                <input type="text"
                                       class="form-control" id="input_<?php echo $g->title;?>"
                                       placeholder="Inserisci un nuovo elemento..."
                                       style="border-right:transparent;height: auto;flex: 1;border-top-right-radius: 0px;border-bottom-right-radius: 0px">
                                <button type="button" onclick="aggiungi_consiglio('<?php echo $g->title;?>')"
                                        class="form-control"
                                        style="width:15%;height: auto;border-left:transparent;border-top-left-radius: 0px;border-bottom-left-radius: 0px">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <?php foreach ($consigli as $c) {?>
                        <?php if($g->title == $c->title){?>
                        <div class="card-header">
                            <div style="display: flex">
                                <input type="text" class="form-control" id="oggetto_<?php echo $c->id;?>"
                                       placeholder="Inserisci un nuovo elemento..."
                                       <?php /* onblur="update_oggetto('<?php echo $c->id;?>')"*/?>
                                       value="<?php echo $c->content?>"
                                       style="height: auto;border:transparent;flex: 1;border-top-right-radius: 0px;border-bottom-right-radius: 0px;text-align: left">
                                <button type="button" onclick="delete_consiglio('<?php echo $c->id;?>')"
                                        class="btn btn-tool" data - card - widget="remove"
                                        style="width:15%;height: auto;border:transparent;border-top-left-radius: 0px;border-bottom-left-radius: 0px">
                                    <i class="fas fa-times"></i>
                                </button>

                                <!--

                                <button type = "button" class="btn btn-tool" data - card - widget = "card-refresh" data - source = "widgets.html" data - source - selector = "#card-refresh-content" data - load - on - init = "false" >
                                    <i class="fas fa-sync-alt" ></i >
                                </button >
                                <button type = "button" class="btn btn-tool" data - card - widget = "maximize" >
                                    <i class="fas fa-expand" ></i >
                                </button >
                                <button type = "button" class="btn btn-tool" data - card - widget = "collapse" >
                                    <i class="fas fa-minus" ></i >
                                </button >

                                -->

                            </div>

                        </div>
                        <?php } ?>
                        <?php } ?>
                    </div>

                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>


<div class="modal" id="modal_eliminato" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header" style="height: 100000%">
                <div class="icon-box"
                     style="color: #fff;position: absolute;margin: 0 auto;left: 0;right: 0;width:10%;height: auto;border-radius: 50%;z-index: 9;background: #82ce34;text-align: center;box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);">
                    <i class="fa fa-solid fa-check"></i>
                </div>
            </div>
            <div class="modal-body">
                <p class="text-center">Consiglio eliminato.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-block" onclick="location.reload()" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal_inserisci" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box"
                     style="padding-top:1%;color: #fff;position: absolute;margin: 0 auto;left: 0;right: 0;width:10%;height: auto;border-radius: 50%;z-index: 9;background: #82ce34;text-align: center;box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);">
                    <i class="fa fa-solid fa-lightbulb"></i>
                </div>
            </div>
            <div class="modal-body">
                <select  id="new_tipo_roadmap"
                        style="width: 100%;border-top: none;border-left: none;border-right:none" required>
                    <?php foreach ($tipo_roadmap as $t){ ?>
                    <option value="<?php echo $t->id;?>"><?php echo $t->title;?></option>
                    <?php } ?>
                </select>
                <br>
                <p class="text-center">Inserisci il titolo</p>
                <input type="text" id="new_title"
                       style="width: 100%;border-top: none;border-left: none;border-right:none"
                       placeholder="Inserisci il titolo..." required>
                <br>
                <br>
                <p class="text-center">Inserisci il Content</p>
                <input type="text" id="new_content"
                       style="width: 100%;border-top: none;border-left: none;border-right:none"
                       placeholder="Inserisci il content..." required>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-block" onclick="new_consiglio()" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal_success" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header" style="height: 100000%">
                <div class="icon-box"
                     style="color: #fff;position: absolute;margin: 0 auto;left: 0;right: 0;width:10%;height: auto;border-radius: 50%;z-index: 9;background: #82ce34;text-align: center;box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);">
                    <i class="fa fa-solid fa-check"></i>
                </div>
            </div>
            <div class="modal-body">
                <p class="text-center">Consiglio inserito!</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-block" data-dismiss="modal" onclick="location.reload()">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal_aggiornato" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header" style="height: 100000%">
                <div class="icon-box"
                     style="color: #fff;position: absolute;margin: 0 auto;left: 0;right: 0;width:10%;height: auto;border-radius: 50%;z-index: 9;background: #82ce34;text-align: center;box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);">
                    <i class="fa fa-solid fa-check"></i>
                </div>
            </div>
            <div class="modal-body">
                <p class="text-center">Oggetto modificato!</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-block" data-dismiss="modal" onclick="location.reload()">OK</button>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="modal_success_P" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box"
                     style="color: #fff;position: absolute;margin: 0 auto;left: 0;right: 0;width:10%;height: auto;border-radius: 50%;z-index: 9;background: #82ce34;text-align: center;box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);">
                    <i class="fa fa-solid fa-check"></i>
                </div>
            </div>
            <div class="modal-body">
                <p class="text-center">Nuova Tipologia consigli inserita!</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-block" data-dismiss="modal" onclick="location.reload()">OK</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    IconPicker.Init({
        // Required: You have to set the path of IconPicker JSON file to "jsonUrl" option. e.g. '/content/plugins/IconPicker/dist/iconpicker-1.5.0.json'
        jsonUrl: '/iconpicker/iconpicker-1.5.0.json',
        // Optional: Change the buttons or search placeholder text according to the language.
        searchPlaceholder: 'Search Icon',
        showAllButton: 'Show All',
        cancelButton: 'Cancel',
        noResultsFound: 'No results found.', // v1.5.0 and the next versions
        borderRadius: '20px', // v1.5.0 and the next versions
    });

    IconPicker.Run('#GetIconPicker', function () {

        // codes...
        console.log('Icon Picker');

    });

    function delete_consiglio(id) {
        $.ajax({
            url: "<?php echo URL::asset('admin/ajax/delete_consiglio') ?>/" + id,
            context: document.body,
            success: $('#modal_eliminato').modal('show'),
            error: (function (result) {
                alert('Errore! Consiglio non eliminato.');
                location.reload();
            })
        });
    }

    function update_oggetto(id) {

        content = document.getElementById('oggetto_' + id).value;
        $.ajax({
            url: "<?php echo URL::asset('admin/ajax/update_oggetto') ?>/" + id + "/" + encodeURIComponent(content),
            context: document.body,
            success: $('#modal_aggiornato').modal('show'),
            error: (function (result) {
                alert('Errore! Oggetto non modificato.');
                location.reload();
            })
        });
    }

    function aggiungi_consiglio(title) {

        content = document.getElementById('input_' + title).value;

        $.ajax({
            url: "<?php echo URL::asset('admin/ajax/aggiungi_consiglio') ?>",
            data: {"title":title,"content":content} ,
            context: document.body,
            success: $('#modal_success').modal('show'),
            error: (function (result) {
                alert('Errore! Consiglio non inserito.');
                location.reload();
            })
        });
    }

    function new_consiglio() {

        title = document.getElementById('new_title').value;
        content = document.getElementById('new_content').value;
        tipo_roadmap = document.getElementById('new_tipo_roadmap').value;

        $.ajax({
            url: "<?php echo URL::asset('admin/ajax/aggiungi_group_consiglio') ?>",
            data:{"title":title,"content":content,"id_tipo_roadmap":tipo_roadmap} ,
            context: document.body,
            success: $('#modal_success_P').modal('show'),
            error: (function (result) {
                alert('Errore! Nuova tipologia consigli non inserita.');
                location.reload();
            })
        });
    }
</script>


