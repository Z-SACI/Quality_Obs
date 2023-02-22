<select name="epr_type" class="form-control" id="">
    @foreach($types as $typ)
        <option value="{{$typ->eprv_id}}" selected>{{$typ->eprv_type}}</option>
    @endforeach
</select>