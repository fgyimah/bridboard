<div class="card" style="height: 200px;">
    <h3 class="text-xl font-normal py-4 mb-3 -ml-5 border-l-4 border-blue-400 pl-4">
        <a href="{{ $project->path()  }}" class="text-black">{{ $project->title  }}</a>
    </h3>
    <div class="text-gray-600">{{ str_limit($project->description)  }}</div>
</div>
