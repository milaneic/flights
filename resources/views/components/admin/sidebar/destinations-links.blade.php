<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDestination"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Destinations</span>
    </a>
    <div id="collapseDestination" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Destinations:</h6>
            <a class="collapse-item" href="{{route('destinations.create')}}">Create a destination</a>
            <a class="collapse-item" href="{{route('destinations.index')}}">View all destinations</a>
        </div>
    </div>
</li>