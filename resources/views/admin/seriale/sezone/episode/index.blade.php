<div class="row">
    @if($episodes)
        <div class="col-xs-12 col-sm-8 offset-2">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nr</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                @foreach($episodes as $episode)
                    <tbody>
                    <tr>
                        <th scope="row">{{ $episode->id }}</th>
                        <td>{{ $episode->episode_nr }}</td>
                        <td><a href="{{ route('episode.edit', [$seriale->id, $sezone->id, $episode->id]) }}"><button class="btn btn-info">Edit</button> </a> </td>
                        <td>
                            <form method="POSt" action="{{ route('episode.destroy', [$seriale->id, $sezone->id, $episode->id]) }}">
                                <input name="_method" type="hidden" value="DELETE">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button> </form>
                        </td>
                    </tr>

                    </tbody>
                @endforeach
            </table>
        </div>
    @endif
</div>