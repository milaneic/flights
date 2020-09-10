<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCompany" aria-expanded="true"
        aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Airline companies</span>
    </a>
    <div id="collapseCompany" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Airline companies:</h6>
            <a class="collapse-item" href="{{route('companies.create')}}">Create a company</a>
            <a class="collapse-item" href="{{route('companies.index')}}">View all companies</a>
        </div>
    </div>
</li>