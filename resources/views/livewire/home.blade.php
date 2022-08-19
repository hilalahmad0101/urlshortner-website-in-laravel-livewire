<div>
    <div class="home">
        @if (session()->has('success'))
            <div style="text-align: center">
                <span style="font-size: 20px;font-weight: bold;color:green">{{ session('success') }}</span>
            </div>
        @endif
        <div class="home__container">
            <h3 class="home__subtitle">
                Simply Your URL
            </h3>
            <div class="home__input">
                <input type="text" wire:model.lazy='url' placeholder="Enter your original URL" />

                <button wire:click="store">
                    Short Url
                </button>
            </div>
            @error('url')
                <span style="color:red">{{ $message }}</span>
            @enderror
            <div class="home__title">
                All the link are public
            </div>
        </div>
    </div>
    <div class="main__container">
        <h1>Recent Urls</h1>
        <div class="table__responsive">
            <table>
                <thead>
                    <tr>
                        <th>Original Url</th>
                        <th>Short Url</th>
                        <th>Copy</th>
                        <th>Time Ago</th>
                        <th>Created on</th>
                        <th>Clicks</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($urls as $url)
                        <tr>
                            <td>{{ $url->url_long }}</td>
                            <td>
                                <a href='{{ $url->short_url }}'>{{ $url->short_url }}</a>
                            </td>
                            <td>
                                <FaCopy />
                            </td>
                            <td>
                                {{ $url->created_at->diffForHumans() }}
                            </td>
                            <td>
                                {{ $url->created_at }}
                            </td>
                            <td>{{ $url->click }}</td>
                        </tr>
                    @empty
                        <h3>Record add successfully</h3>
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>
</div>
