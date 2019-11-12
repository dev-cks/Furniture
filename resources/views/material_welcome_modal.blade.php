@foreach($whole_materials as $index => $material)
    <div class="custom-radio d-inline-block">
        <img class="rounded-circle img-fluid d-block mx-auto material-image-modal" src="<?=asset('image').'/'.$material->img;?>"  alt="" material-id="<?=$material->id;?>">
        <p class="center" style="text-align: center"><?=$material->internal_name;?></p>
    </div>
@endforeach
