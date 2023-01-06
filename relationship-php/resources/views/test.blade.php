@foreach($projects as $project)
<a href="/project">  <button class="btn btn-danger" >
    
{{$project->name}}
</button></a>
@endforeach