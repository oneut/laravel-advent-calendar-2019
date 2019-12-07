<html>
<body>
<div>
    <div>
        <h2>User</h2>
        <ul>
            @foreach($users as $user)
                <li>{{$user->getFullName()}}</li>
            @endforeach
        </ul>

        <h2>Hamburger Set</h2>
        <ul>
            @foreach($hamburgerSets as $hamburgerSet)
                <li>{{ $hamburgerSet->totalCalorie() }}</li>
            @endforeach
        </ul>

        <h2>OrderSubtotal</h2>
        <p>{{ $orderSubtotal->subtotal }}</p>

        <h2>Order -> OrderSubtotal</h2>
        <ul>
            @foreach($orders as $order)
                <li>{{ $order->orderSubtotal->subtotal }}</li>
            @endforeach
        </ul>

        <h2>GitHub Repositories</h2>
        <ul>
            @foreach($gitHubOctocatRepositories as $repository)
                <li>
                    <dl>
                        <dt>{{ $repository->name }}</dt>
                        <dd>{{ $repository->getAbbrDescription() }}</dd>
                    </dl>
                </li>
            @endforeach
        </ul>

        <h2>GitHub Repository</h2>
        <dl>
            <dt>{{ $gitHubOctocatRepository->name }}</dt>
            <dd>{{ $gitHubOctocatRepository->getAbbrDescription() }}</dd>
        </dl>

        <h2>Reuqest Ids</h2>
        {{ Form::open(['method' => 'get', 'action' => 'HomeController@index']) }}
            {{ Form::text('csv_ids', '', ['placeholder' => '1,2,3']) }}
        {!! Form::close() !!}
        <ul>
            @foreach($requestIds as $requestId)
            <li>{{ $requestId }}</li>
            @endforeach
        </ul>
    </div>
</div>
</body>
</html>
