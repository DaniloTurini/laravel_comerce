

<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class'=>'form-control']) !!}
</div>

<div class="checkbox">
    <label>
        {!! Form::checkbox('featured', 1, ['checked'=>'checked']) !!} Featured
    </label>
</div>
<div class="checkbox">
    <label>
        {!! Form::checkbox('recommend', 1, ['checked'=>'checked']) !!} Recommend
    </label>
</div>

