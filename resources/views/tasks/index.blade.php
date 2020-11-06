<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tasks</title>
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/css/foundation.min.css" integrity="sha256-ogmFxjqiTMnZhxCqVmcqTvjfe1Y/ec4WaRj/aQPvn+I=" crossorigin="anonymous">
        <style>
            body {
                font-family: 'Nunito';
            }
            .small-container {
                width: 75%;
            }
        </style>
    </head>
    <body>
        <div class="grid-container small-container">
            <h4>Tasks</h4> <hr>
            <div class="grid-x grid-margin-x">
                <form class="cell" method="POST" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <fieldset class="fieldset">
                        <legend>Detail:</legend>
                        <label>title*
                            <input type="text" name="title">
                        </label>
                        <label>description
                            <textarea name="description"></textarea>
                        </label>
                        <button name="sunmit" value="save" class="small button">Create&ensp;&gt;</button>
                    </fieldset>
                </form>
                <div class="cell callout">
                    @if (isset($items))
                        <div>{{ $items->links() }}</div>

                        <ul class="no-bullet">
                            @foreach($items as $item)
                                <li>
                                    <div class="card">
                                      <div class="card-divider">
                                        <p class="h4">{{ $item->getKey() }}.&ensp;{{ $item->title }}</p>
                                      </div>
                                      @if (isset($item->description))
                                      <div class="card-section">
                                        <p class="h6">{{ $item->description }}</p>
                                      </div>
                                      @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
