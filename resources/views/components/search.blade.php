<div class="row">
    <div class="col">
        <form action=" {{ route('partials.pet') }}" method="GET" class="d-flex">
            <input name="search" placeholder="Id or status" class="form-control me-2" type="text">
            <button class="btn btn-dark" type="submit">Search</button>
        </form>
    </div>
</div>


