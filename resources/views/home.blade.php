<x-site-layout>
    <section class="relative overflow-hidden border-b border-gym-border">
        <div class="absolute inset-0 bg-gradient-to-br from-gym-orange/10 via-transparent to-gym-gold/5"></div>
        <div class="relative mx-auto max-w-7xl px-4 py-24 sm:px-6 sm:py-32 lg:px-8">
            <div class="max-w-3xl">
                <p class="mb-4 text-sm font-semibold uppercase tracking-widest text-gym-gold">Premium Fitness</p>
                <h1 class="text-4xl font-bold leading-tight text-white sm:text-6xl">
                    Train Strong.<br>
                    <span class="text-gym-gold">Track Better.</span>
                </h1>
                <p class="mt-6 text-lg leading-relaxed text-gym-muted">
                    Build strength, stay consistent, and manage your membership in one place.
                    Professional coaches, modern equipment, and real progress tracking.
                </p>
                <div class="mt-10 flex flex-wrap gap-4">
                    <a href="{{ route('register') }}" class="btn-gold">Join Now</a>
                    <a href="{{ route('offers') }}" class="btn-outline">View Offers</a>
                </div>
            </div>
        </div>
    </section>

    <section id="offers" class="border-b border-gym-border py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading
                title="Membership Offers"
                subtitle="Pick the plan that fits your goals. Upgrade anytime."
            />

            <div class="grid gap-8 md:grid-cols-3">
                @foreach ($memberships as $membership)
                    <x-membership-card :membership="$membership" />
                @endforeach
            </div>

            <div class="mt-10 text-center">
                <a href="{{ route('offers') }}" class="btn-outline">See Full Plan Details</a>
            </div>
        </div>
    </section>

    <section id="why-us" class="border-b border-gym-border bg-gym-dark py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading
                title="Why Choose Us"
                subtitle="We focus on results, community, and a premium training experience."
            />

            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                <div class="gym-card text-center">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-gym-gold/10 text-2xl text-gym-gold">⚡</div>
                    <h3 class="mt-4 font-semibold text-white">Modern Equipment</h3>
                    <p class="mt-2 text-sm text-gym-muted">Well-maintained machines and free weights for every level.</p>
                </div>
                <div class="gym-card text-center">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-gym-gold/10 text-2xl text-gym-gold">👤</div>
                    <h3 class="mt-4 font-semibold text-white">Expert Trainers</h3>
                    <p class="mt-2 text-sm text-gym-muted">Certified coaches who build plans around your goals.</p>
                </div>
                <div class="gym-card text-center">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-gym-gold/10 text-2xl text-gym-gold">📊</div>
                    <h3 class="mt-4 font-semibold text-white">Track Progress</h3>
                    <p class="mt-2 text-sm text-gym-muted">Attendance and membership data kept simple and clear.</p>
                </div>
                <div class="gym-card text-center">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-gym-gold/10 text-2xl text-gym-gold">🕐</div>
                    <h3 class="mt-4 font-semibold text-white">Flexible Hours</h3>
                    <p class="mt-2 text-sm text-gym-muted">Open early and late so training fits your schedule.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="trainers" class="border-b border-gym-border py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading
                title="Meet Our Trainers"
                subtitle="Dedicated professionals ready to push you forward."
            />

            <div class="grid gap-8 md:grid-cols-3">
                <div class="gym-card text-center">
                    <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-gym-border text-3xl font-bold text-gym-gold">MJ</div>
                    <h3 class="mt-4 text-lg font-bold text-white">Marcus James</h3>
                    <p class="text-sm text-gym-gold">Strength & Conditioning</p>
                    <p class="mt-3 text-sm text-gym-muted">10+ years coaching athletes and beginners alike.</p>
                </div>
                <div class="gym-card text-center">
                    <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-gym-border text-3xl font-bold text-gym-gold">SR</div>
                    <h3 class="mt-4 text-lg font-bold text-white">Sofia Rivera</h3>
                    <p class="text-sm text-gym-gold">HIIT & Fat Loss</p>
                    <p class="mt-3 text-sm text-gym-muted">High-energy sessions built for fat burn and endurance.</p>
                </div>
                <div class="gym-card text-center">
                    <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-gym-border text-3xl font-bold text-gym-gold">DK</div>
                    <h3 class="mt-4 text-lg font-bold text-white">David Kim</h3>
                    <p class="text-sm text-gym-gold">Mobility & Recovery</p>
                    <p class="mt-3 text-sm text-gym-muted">Helps members train hard while staying injury-free.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="border-b border-gym-border bg-gym-dark py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading
                title="What Members Say"
                subtitle="Real stories from people who train with us every week."
            />

            <div class="grid gap-8 md:grid-cols-3">
                <blockquote class="gym-card">
                    <p class="text-gym-muted">"Clean gym, great vibe. I hit my goals in three months and the staff actually remembers my name."</p>
                    <footer class="mt-4 font-semibold text-white">— Alex P.</footer>
                </blockquote>
                <blockquote class="gym-card">
                    <p class="text-gym-muted">"The trainers push you without being intimidating. Best membership I have had."</p>
                    <footer class="mt-4 font-semibold text-white">— Nina L.</footer>
                </blockquote>
                <blockquote class="gym-card">
                    <p class="text-gym-muted">"Premium feel, fair prices. Check-in is fast and the floor never feels overcrowded."</p>
                    <footer class="mt-4 font-semibold text-white">— Chris M.</footer>
                </blockquote>
            </div>
        </div>
    </section>

    <section id="contact" class="py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading
                title="Get In Touch"
                subtitle="Visit us or send a message. We reply within one business day."
            />

            <div class="grid gap-8 lg:grid-cols-2">
                <div class="gym-card space-y-4">
                    <div>
                        <p class="text-sm font-medium text-gym-gold">Address</p>
                        <p class="text-gym-muted">123 Iron Street, Fitness City</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gym-gold">Phone</p>
                        <p class="text-gym-muted">+1 (555) 123-4567</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gym-gold">Email</p>
                        <p class="text-gym-muted">hello@gymfit.com</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gym-gold">Hours</p>
                        <p class="text-gym-muted">Mon–Fri 5am–11pm · Sat–Sun 6am–9pm</p>
                    </div>
                </div>

                <form class="gym-card space-y-4" action="#" method="POST">
                    @csrf
                    <div>
                        <label for="contact_name" class="block text-sm font-medium text-gym-muted">Name</label>
                        <input type="text" id="contact_name" name="name" class="gym-input" placeholder="Your name">
                    </div>
                    <div>
                        <label for="contact_email" class="block text-sm font-medium text-gym-muted">Email</label>
                        <input type="email" id="contact_email" name="email" class="gym-input" placeholder="you@email.com">
                    </div>
                    <div>
                        <label for="contact_message" class="block text-sm font-medium text-gym-muted">Message</label>
                        <textarea id="contact_message" name="message" rows="4" class="gym-input" placeholder="How can we help?"></textarea>
                    </div>
                    <button type="button" class="btn-gold w-full sm:w-auto">Send Message</button>
                </form>
            </div>
        </div>
    </section>
</x-site-layout>
