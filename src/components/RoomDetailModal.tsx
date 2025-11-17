import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogHeader,
  DialogTitle,
} from "@/components/ui/dialog";
import { Button } from "@/components/ui/button";
import { Check } from "lucide-react";

interface RoomDetailModalProps {
  isOpen: boolean;
  onClose: () => void;
  room: {
    title: string;
    description: string;
    image: string;
    features: string[];
    price: string;
    fullDescription: string;
  } | null;
}

const RoomDetailModal = ({ isOpen, onClose, room }: RoomDetailModalProps) => {
  if (!room) return null;

  return (
    <Dialog open={isOpen} onOpenChange={onClose}>
      <DialogContent className="max-w-3xl max-h-[90vh] overflow-y-auto">
        <DialogHeader>
          <DialogTitle className="text-3xl font-serif">{room.title}</DialogTitle>
          <DialogDescription className="text-base">{room.description}</DialogDescription>
        </DialogHeader>

        <div className="space-y-6">
          <img
            src={room.image}
            alt={room.title}
            className="w-full h-80 object-cover rounded-lg"
          />

          <div>
            <h4 className="font-serif text-xl mb-3">About This Suite</h4>
            <p className="text-muted-foreground leading-relaxed">{room.fullDescription}</p>
          </div>

          <div>
            <h4 className="font-serif text-xl mb-3">Amenities</h4>
            <ul className="grid grid-cols-2 gap-3">
              {room.features.map((feature, index) => (
                <li key={index} className="flex items-start gap-2">
                  <Check className="h-5 w-5 text-gold mt-0.5 flex-shrink-0" />
                  <span className="text-sm">{feature}</span>
                </li>
              ))}
            </ul>
          </div>

          <div className="flex items-center justify-between pt-6 border-t border-border">
          <div>
            <span className="text-sm text-muted-foreground">Starting from</span>
            <div className="text-3xl font-serif text-gold">{room.price}</div>
          </div>
          <Button variant="gold" className="px-8">
            Book Now
          </Button>
          </div>
        </div>
      </DialogContent>
    </Dialog>
  );
};

export default RoomDetailModal;
