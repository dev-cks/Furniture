@foreach($materials as $index => $material)
    <div class="custom-radio d-inline-block">
        <img class="rounded-circle img-fluid d-block mx-auto material-image-modal" src="<?=asset('image').'/'.$material->img;?>"  alt="" material-id="<?=$material->material_id;?>" id="<?='material_modal_img'.$material->material_id;?>">
    </div>
@endforeach
