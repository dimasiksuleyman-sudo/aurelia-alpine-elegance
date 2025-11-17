import { useState } from "react";
import { ChevronDown, Sparkles, UtensilsCrossed, Mountain, Wine, MapPin, Mail, Phone } from "lucide-react";
import BookingWidget from "@/components/BookingWidget";
import RoomCard from "@/components/RoomCard";
import ExperienceBox from "@/components/ExperienceBox";
import TestimonialCard from "@/components/TestimonialCard";
import RoomDetailModal from "@/components/RoomDetailModal";
import Newsletter from "@/components/Newsletter";

import hotelExterior from "@/assets/hotel-exterior.jpg";
import interiorLounge from "@/assets/interior-lounge.jpg";
import alpineSuite from "@/assets/alpine-suite.jpg";
import summitPenthouse from "@/assets/summit-penthouse.jpg";
import gardenRetreat from "@/assets/garden-retreat.jpg";
import testimonialSarah from "@/assets/testimonial-sarah.jpg";
import testimonialElena from "@/assets/testimonial-elena.jpg";

const Index = () => {
  const [selectedRoom, setSelectedRoom] = useState<any>(null);

  const rooms = [
    {
      image: alpineSuite,
      badge: "MOST POPULAR",
      title: "Alpine Suite",
      description: "48 sqm | King Bed | Mountain View Balcony",
      features: [
        "Private balcony with panoramic views",
        "Freestanding soaking tub",
        "Italian marble bathroom",
      ],
      price: "From €450/night",
      fullDescription:
        "Our signature Alpine Suite offers the perfect blend of contemporary luxury and mountain charm. Wake up to breathtaking views of the Swiss Alps from your private balcony, unwind in the freestanding soaking tub, and experience the finest Italian marble craftsmanship in your spacious bathroom.",
    },
    {
      image: summitPenthouse,
      title: "Summit Penthouse",
      description: "85 sqm | Premium Suite | Wraparound Terrace",
      features: [
        "270-degree mountain vistas",
        "Private terrace with hot tub",
        "Separate living area",
      ],
      price: "From €850/night",
      fullDescription:
        "Experience alpine living at its finest in our exclusive Summit Penthouse. This spacious suite features floor-to-ceiling windows offering 270-degree mountain views, a private terrace with heated hot tub, and a separate living area perfect for entertaining or relaxation.",
    },
    {
      image: gardenRetreat,
      title: "Garden Retreat",
      description: "42 sqm | Queen Bed | Private Garden Access",
      features: [
        "Direct garden access",
        "Outdoor seating area",
        "Floor-to-ceiling windows",
      ],
      price: "From €380/night",
      fullDescription:
        "Find tranquility in our Garden Retreat, featuring direct access to our manicured alpine gardens. This ground-floor suite offers a seamless indoor-outdoor experience with floor-to-ceiling windows, a private outdoor seating area, and the perfect setting for morning meditation or evening relaxation.",
    },
  ];

  return (
    <div className="min-h-screen">
      {/* HERO SECTION */}
      <section className="relative h-screen flex items-center justify-center overflow-hidden">
        <div
          className="absolute inset-0 bg-cover bg-center"
          style={{
            backgroundImage: `url(${hotelExterior})`,
          }}
        >
          <div className="absolute inset-0 bg-gradient-to-b from-transparent to-deep-charcoal/40" />
        </div>

        <div className="relative z-10 text-center text-background px-4">
          <h1 className="text-6xl md:text-7xl font-serif mb-4 animate-fade-in">
            The Aurelia
          </h1>
          <p className="text-xl md:text-2xl font-light tracking-wide animate-fade-in">
            Where Mountains Meet Luxury
          </p>
        </div>

        <BookingWidget />

        <div className="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 animate-bounce">
          <ChevronDown className="w-8 h-8 text-background" />
        </div>
      </section>

      {/* WELCOME SECTION */}
      <section className="min-h-screen bg-background py-20 px-4">
        <div className="container mx-auto">
          <div className="grid md:grid-cols-2 gap-12 items-center">
            <div className="space-y-6">
              <p className="text-gold text-sm tracking-widest uppercase">Welcome to The Aurelia</p>
              <h2 className="text-5xl md:text-6xl font-serif text-foreground">
                Experience Alpine Elegance
              </h2>
              <div className="space-y-4 text-lg leading-relaxed text-muted-foreground">
                <p>
                  Nestled in the heart of the Swiss Alps, The Aurelia offers an unparalleled escape
                  where contemporary luxury meets timeless mountain charm. Our boutique property
                  features 24 carefully curated suites, each designed to frame the spectacular
                  alpine vistas.
                </p>
                <p>
                  Every detail has been thoughtfully considered - from locally sourced materials to
                  our partnership with Michelin-starred chefs. We believe true luxury lies in
                  authentic experiences and genuine hospitality.
                </p>
                <p>
                  Whether you seek adventure on mountain trails or tranquility in our award-winning
                  spa, The Aurelia becomes your sanctuary above the clouds.
                </p>
              </div>
              <a
                href="#experiences"
                className="inline-block text-gold hover:text-gold-muted transition-colors text-lg"
              >
                Discover Our Story →
              </a>
            </div>

            <div
              className="relative h-[600px] rounded-lg overflow-hidden shadow-2xl transform hover:scale-[1.02] transition-transform duration-500"
              style={{
                backgroundImage: `url(${interiorLounge})`,
                backgroundSize: "cover",
                backgroundPosition: "center",
              }}
            />
          </div>
        </div>
      </section>

      {/* ROOMS SHOWCASE */}
      <section className="py-20 px-4 bg-cream">
        <div className="container mx-auto">
          <div className="text-center mb-16">
            <h2 className="text-5xl md:text-6xl font-serif mb-4">Signature Suites</h2>
            <p className="text-xl text-muted-foreground">Each room tells its own story</p>
          </div>

          <div className="grid md:grid-cols-3 gap-8">
            {rooms.map((room, index) => (
              <RoomCard
                key={index}
                {...room}
                onViewDetails={() => setSelectedRoom(room)}
              />
            ))}
          </div>
        </div>
      </section>

      {/* EXPERIENCES */}
      <section id="experiences" className="py-20 px-4 bg-deep-charcoal">
        <div className="container mx-auto">
          <div className="text-center mb-16">
            <h2 className="text-5xl md:text-6xl font-serif text-background mb-4">
              Curated Experiences
            </h2>
            <p className="text-xl text-cream/80">
              Create memories that last beyond your stay
            </p>
          </div>

          <div className="grid md:grid-cols-4 gap-8">
            <ExperienceBox
              icon={Sparkles}
              title="Alpine Spa Sanctuary"
              description="Award-winning treatments using local herbs and thermal waters"
            />
            <ExperienceBox
              icon={UtensilsCrossed}
              title="Michelin-Starred Dining"
              description="Contemporary Alpine cuisine crafted by Chef Marcus Klein"
            />
            <ExperienceBox
              icon={Mountain}
              title="Mountain Adventures"
              description="Private guided hikes, skiing, and paragliding experiences"
            />
            <ExperienceBox
              icon={Wine}
              title="Wine Cellar"
              description="Over 400 labels from Swiss and international vineyards"
            />
          </div>
        </div>
      </section>

      {/* TESTIMONIALS */}
      <section className="py-20 px-4 bg-cream">
        <div className="container mx-auto">
          <div className="text-center mb-16">
            <h2 className="text-5xl md:text-6xl font-serif">Guest Stories</h2>
          </div>

          <div className="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <TestimonialCard
              quote="The Aurelia redefined luxury for us. The attention to detail is extraordinary, and the staff anticipated our every need. The views alone are worth the journey."
              name="Sarah & James Mitchell"
              location="London, UK"
              image={testimonialSarah}
            />
            <TestimonialCard
              quote="Three visits and counting. This is our sanctuary. From the spa to the Summit Penthouse views, everything exceeds expectations. Already planning our return."
              name="Dr. Elena Rossi"
              location="Milan, Italy"
              image={testimonialElena}
            />
          </div>
        </div>
      </section>

      {/* LOCATION */}
      <section className="py-20 px-4 bg-background">
        <div className="container mx-auto">
          <div className="grid md:grid-cols-2 gap-12 items-center">
            <div className="h-[500px] bg-soft-beige rounded-lg flex items-center justify-center">
              <div className="text-center">
                <MapPin className="w-16 h-16 text-gold mx-auto mb-4" />
                <p className="text-2xl font-serif text-foreground">Zermatt, Switzerland</p>
                <p className="text-muted-foreground mt-2">Interactive map coming soon</p>
              </div>
            </div>

            <div className="space-y-6">
              <h2 className="text-4xl md:text-5xl font-serif">Find Your Way to Paradise</h2>

              <div className="space-y-4">
                <div className="flex items-start gap-3">
                  <MapPin className="w-5 h-5 text-gold mt-1 flex-shrink-0" />
                  <div>
                    <p className="font-medium">Address</p>
                    <p className="text-muted-foreground">Bergstrasse 42, 3920 Zermatt, Switzerland</p>
                  </div>
                </div>

                <div className="flex items-start gap-3">
                  <Mail className="w-5 h-5 text-gold mt-1 flex-shrink-0" />
                  <div>
                    <p className="font-medium">Email</p>
                    <p className="text-muted-foreground">reservations@theaurelia.ch</p>
                  </div>
                </div>

                <div className="flex items-start gap-3">
                  <Phone className="w-5 h-5 text-gold mt-1 flex-shrink-0" />
                  <div>
                    <p className="font-medium">Phone</p>
                    <p className="text-muted-foreground">+41 27 966 8800</p>
                  </div>
                </div>
              </div>

              <div className="pt-6 border-t border-border">
                <h3 className="font-serif text-xl mb-3">Travel Information</h3>
                <p className="text-muted-foreground leading-relaxed">
                  90 minutes from Geneva Airport<br />
                  10 minutes walk from Zermatt train station<br />
                  Car-free village - electric shuttle available
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* FOOTER */}
      <footer className="bg-deep-charcoal text-cream py-16 px-4">
        <div className="container mx-auto">
          <div className="grid md:grid-cols-3 gap-12 mb-12">
            <div>
              <h3 className="text-3xl font-serif text-gold mb-4">The Aurelia</h3>
              <p className="text-cream/80 mb-6 leading-relaxed">
                Where mountains meet luxury. Experience alpine elegance in the heart of Zermatt.
              </p>
              <div className="flex gap-4">
                {/* Social icons would go here */}
              </div>
            </div>

            <div>
              <h4 className="font-serif text-xl mb-4">Quick Links</h4>
              <ul className="space-y-2">
                <li><a href="#rooms" className="text-cream/80 hover:text-gold transition-colors">Rooms</a></li>
                <li><a href="#experiences" className="text-cream/80 hover:text-gold transition-colors">Dining</a></li>
                <li><a href="#experiences" className="text-cream/80 hover:text-gold transition-colors">Spa</a></li>
                <li><a href="#location" className="text-cream/80 hover:text-gold transition-colors">Contact</a></li>
                <li><a href="#careers" className="text-cream/80 hover:text-gold transition-colors">Careers</a></li>
              </ul>
            </div>

            <div>
              <h4 className="font-serif text-xl mb-4">Newsletter</h4>
              <p className="text-cream/80 mb-4">Subscribe for exclusive offers and updates</p>
              <Newsletter />
            </div>
          </div>

          <div className="pt-8 border-t border-background/20 text-center text-cream/60 text-sm">
            <p>© 2024 The Aurelia Hotel. All rights reserved.</p>
          </div>
        </div>
      </footer>

      {/* Room Detail Modal */}
      <RoomDetailModal
        isOpen={!!selectedRoom}
        onClose={() => setSelectedRoom(null)}
        room={selectedRoom}
      />
    </div>
  );
};

export default Index;
