import { Button } from "@/components/ui/button";
import { Check } from "lucide-react";

interface RoomCardProps {
  image: string;
  badge?: string;
  title: string;
  description: string;
  features: string[];
  price: string;
  onViewDetails: () => void;
}

const RoomCard = ({
  image,
  badge,
  title,
  description,
  features,
  price,
  onViewDetails,
}: RoomCardProps) => {
  return (
    <div className="group bg-card rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
      <div className="relative h-64 overflow-hidden">
        <img
          src={image}
          alt={title}
          className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
        />
        {badge && (
          <div className="absolute top-4 right-4 bg-gold text-deep-charcoal px-4 py-2 rounded-full text-sm font-medium">
            {badge}
          </div>
        )}
      </div>

      <div className="p-6">
        <h3 className="text-3xl font-serif mb-2">{title}</h3>
        <p className="text-muted-foreground mb-4">{description}</p>

        <ul className="space-y-2 mb-6">
          {features.map((feature, index) => (
            <li key={index} className="flex items-start gap-2 text-sm">
              <Check className="h-4 w-4 text-gold mt-0.5 flex-shrink-0" />
              <span>{feature}</span>
            </li>
          ))}
        </ul>

        <div className="flex items-center justify-between pt-4 border-t border-border">
          <span className="text-2xl font-serif text-gold">{price}</span>
          <Button
            variant="outline"
            onClick={onViewDetails}
            className="border-gold text-gold hover:bg-gold hover:text-deep-charcoal transition-all"
          >
            View Details
          </Button>
        </div>
      </div>
    </div>
  );
};

export default RoomCard;
