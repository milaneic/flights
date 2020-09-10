<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCountry" aria-expanded="true"
        aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Countries</span>
    </a>
    <div id="collapseCountry" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Countries:</h6>
            <a class="collapse-item" href="{{route('countries.create')}}">Create a country</a>
            <a class="collapse-item" href="{{route('countries.index')}}">View all countries</a>
        </div>
    </div>
</li>