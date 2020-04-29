<div>
    <ul class="nav flex-column nav-pills navbar-admin">
        <li class="nav-item">
          <a class="d-flex justify-content-between nav-link @if(@$link == 1) active @else text-dark @endif" href="{{ route('admin.orders-avaiables') }}">
            <span>
                Disponíveis
            </span>
            <div>
                <span class="badge @if(@$link == 1) badge-light @else badge-first @endif d-flex m-auto">{{ $avaiables->count() }}</span>
            </div>
          </a>
        </li>
        <li class="nav-item">
          <a class="d-flex justify-content-between nav-link @if(@$link == 2) active @else text-dark @endif" href="{{ route('admin.orders-pendings') }}">
            <span>
                Pendentes
            </span>
            <div>
                <span class="badge @if(@$link == 2) badge-light @else badge-first @endif d-flex m-auto">{{ $pendings->count() }}</span>
            </div>
          </a>
        </li>
    </ul>
</div>
