import { Star } from "lucide-react";

interface TestimonialCardProps {
  quote: string;
  name: string;
  location: string;
  image: string;
}

const TestimonialCard = ({ quote, name, location, image }: TestimonialCardProps) => {
  return (
    <div className="bg-background p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
      <div className="flex gap-1 mb-4">
        {[...Array(5)].map((_, i) => (
          <Star key={i} className="w-5 h-5 fill-gold text-gold" />
        ))}
      </div>

      <blockquote className="text-lg text-foreground/90 mb-6 leading-relaxed italic">
        "{quote}"
      </blockquote>

      <div className="flex items-center gap-4">
        <img
          src={image}
          alt={name}
          className="w-14 h-14 rounded-full object-cover"
        />
        <div>
          <div className="font-medium text-foreground">{name}</div>
          <div className="text-sm text-muted-foreground">{location}</div>
        </div>
      </div>
    </div>
  );
};

export default TestimonialCard;
