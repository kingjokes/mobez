<x-app>
    <x-slot:title>
        Contact Us | Fashion by Mobez
    </x-slot>
    <main>
        <div class="mb-4 pb-4"></div>
        <section class="contact-us container">
            <div class="mw-930">
                <h2 class="page-title">CONTACT US</h2>
            </div>
        </section>

        <section class="google-map mb-5">
            <h2 class="d-none">Contact US</h2>
            <div id="map" class="google-map__wrapper">
                <div style="height:500px!important;">
                    <iframe title="Address Map" style="height:100%; width: 100%; border:0" frameBorder="0" scrolling="no"
                        marginHeight="0" marginWidth="0" id="gmap_canvas"
                        src="https://maps.google.com/maps?hl=en&q=London&t=&z=12&ie=UTF8&iwloc=B&output=embed"></iframe>
                </div>
            </div>
        </section>

        <section class="contact-us container">
            <div class="mw-930">
                <div class="row mb-5">
                    <div class="col-lg-6">
                        <h3 class="mb-4">Store in London</h3>
                        <p class="mb-4">1418 River Drive, Suite 35 Cottonhall, CA 9622<br>United Kingdom</p>
                        <p class="mb-4">sale@fashionbymobez.com<br>+44 20 7123 4567</p>
                    </div>
                    <div class="col-lg-6">
                        <h3 class="mb-4">Store in Istanbul</h3>
                        <p class="mb-4">1418 River Drive, Suite 35 Cottonhall, CA 9622<br>Turky</p>
                        <p class="mb-4">sale@fashionbymobez.com<br>+90 212 555 1212</p>
                    </div>
                </div>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="contact-us__form">
                    <form name="contact-us-form" action="/send-message" method="POST">
                        @csrf
                        <h3 class="mb-5">Get In Touch</h3>
                        <div class="form-floating my-4">
                            <input type="text" name="name" required class="form-control" id="contact_us_name"
                                placeholder="Name *" required>
                            <label for="contact_us_name">Name *</label>
                        </div>
                        <div class="form-floating my-4">
                            <input type="email" name="email" required class="form-control" id="contact_us_email"
                                placeholder="Email address *" required>
                            <label for="contact_us_name">Email address *</label>
                        </div>
                        <div class="my-4">
                            <textarea name="messages" min="10" required class="form-control form-control_gray" placeholder="Your Message"
                                cols="30" rows="8" required></textarea>
                        </div>
                        <div class="my-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>


    </main>

    <div class="mb-5 pb-xl-5"></div>




    {{-- <script>
        (g => {
            var h, a, k, p = "The Google Maps JavaScript API",
                c = "google",
                l = "importLibrary",
                q = "__ib__",
                m = document,
                b = window;
            b = b[c] || (b[c] = {});
            var d = b.maps || (b.maps = {}),
                r = new Set,
                e = new URLSearchParams,
                u = () => h || (h = new Promise(async (f, n) => {
                    await (a = m.createElement("script"));
                    e.set("libraries", [...r] + "");
                    for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                    e.set("callback", c + ".maps." + q);
                    a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                    d[q] = f;
                    a.onerror = () => h = n(Error(p + " could not load."));
                    a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                    m.head.append(a)
                }));
            d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() =>
                d[l](f, ...n))
        })
        ({
            key: "AIzaSyAnKJxI0i5KGFgD3QTSg_aXbQk_Ze2kNAw",
            v: "beta"
        });
    </script> --}}
    {{-- <script src="js/googlemap-setting.js"></script> --}}
</x-app>
