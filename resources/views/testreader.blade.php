@extends("layout")

        @section('content')

            @if(empty($sort))
                <?php $sort="no-sort"; ?>
            @endif




            <div class="container-fullwidth filter">
                <div class="container">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" value="pernik" aria-haspopup="true" aria-expanded="false">
                            @if ($sort == "ASC")
                                Oldest
                            @elseif ($sort == "DSC")
                                Newest
                            @else
                                Sort by...
                            @endif
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <form action="{{ route('sortDateDesc')}}" method="GET" class="form-inline md-form mr-auto mb-4">
                                <button class="form-control mx-auto" name="query" value="{{ request()->input('query') }}">Newest</button>
                            </form>
                            <form action="{{ route('sortDateAsc')}}" method="GET" class="form-inline md-form mr-auto mb-4">
                                <button class="form-control mx-auto" name="query" value="{{ request()->input('query') }}">Oldest</button>
                            </form>
                        </div>
                      </div>
                </div>
            </div>


            
            
            <div class="container">


                <div><?php
                    //Print all the entries
                    foreach($entries as $entry){
                        ?>
                        <h3 class="py-3"><?= $entry->title ?></h3>
                        <img src="<?= $entry->enclosure->attributes()->url ?>" alt="obrazok k clanku">
                        <p>Publication date: <?= strftime('%m/%d/%Y %I:%M %p', strtotime($entry->pubDate)) ?></p>
                        <p>Description: <?= $entry->description ?></p>
                        <p>Full article: 
                            <a href="<?= $entry->link ?>" target="_blank">link</a>
                        </p>
                        <hr>
                        <?php
                    }
                    ?>
                </div>
            </div>
             
        @endsection
