import { useState, useEffect } from "react";
import { Calendar } from "@/components/ui/calendar";
import { Popover, PopoverContent, PopoverTrigger } from "@/components/ui/popover";
import { Button } from "@/components/ui/button";
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from "@/components/ui/select";
import { CalendarIcon, Users } from "lucide-react";
import { format } from "date-fns";
import { cn } from "@/lib/utils";
import { toast } from "sonner";

const BookingWidget = () => {
  const [isSticky, setIsSticky] = useState(false);
  const [checkIn, setCheckIn] = useState<Date>();
  const [checkOut, setCheckOut] = useState<Date>();
  const [guests, setGuests] = useState("2");

  useEffect(() => {
    const handleScroll = () => {
      const heroHeight = window.innerHeight;
      setIsSticky(window.scrollY > heroHeight - 100);
    };

    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  const handleBooking = () => {
    if (!checkIn || !checkOut) {
      toast.error("Please select check-in and check-out dates");
      return;
    }

    console.log("Booking submitted:", {
      checkIn: format(checkIn, "PPP"),
      checkOut: format(checkOut, "PPP"),
      guests,
    });

    toast.success("Availability request submitted! We'll contact you shortly.");
  };

  return (
    <div
      className={cn(
        "transition-all duration-300 z-50",
        isSticky
          ? "fixed bottom-8 left-1/2 -translate-x-1/2 shadow-2xl"
          : "absolute bottom-20 left-1/2 -translate-x-1/2"
      )}
    >
      <div className="bg-background/95 backdrop-blur-lg border border-border rounded-lg p-6 shadow-xl max-w-4xl">
        <div className="flex flex-col md:flex-row gap-4 items-end">
          {/* Check-in Date */}
          <div className="flex-1">
            <label className="text-sm text-muted-foreground mb-2 block">Check-in</label>
            <Popover>
              <PopoverTrigger asChild>
                <Button
                  variant="outline"
                  className={cn(
                    "w-full justify-start text-left font-normal",
                    !checkIn && "text-muted-foreground"
                  )}
                >
                  <CalendarIcon className="mr-2 h-4 w-4" />
                  {checkIn ? format(checkIn, "PPP") : "Select date"}
                </Button>
              </PopoverTrigger>
              <PopoverContent className="w-auto p-0" align="start">
                <Calendar
                  mode="single"
                  selected={checkIn}
                  onSelect={setCheckIn}
                  disabled={(date) => date < new Date()}
                  initialFocus
                  className="pointer-events-auto"
                />
              </PopoverContent>
            </Popover>
          </div>

          {/* Check-out Date */}
          <div className="flex-1">
            <label className="text-sm text-muted-foreground mb-2 block">Check-out</label>
            <Popover>
              <PopoverTrigger asChild>
                <Button
                  variant="outline"
                  className={cn(
                    "w-full justify-start text-left font-normal",
                    !checkOut && "text-muted-foreground"
                  )}
                >
                  <CalendarIcon className="mr-2 h-4 w-4" />
                  {checkOut ? format(checkOut, "PPP") : "Select date"}
                </Button>
              </PopoverTrigger>
              <PopoverContent className="w-auto p-0" align="start">
                <Calendar
                  mode="single"
                  selected={checkOut}
                  onSelect={setCheckOut}
                  disabled={(date) => date < (checkIn || new Date())}
                  initialFocus
                  className="pointer-events-auto"
                />
              </PopoverContent>
            </Popover>
          </div>

          {/* Guests */}
          <div className="flex-1">
            <label className="text-sm text-muted-foreground mb-2 block">Guests</label>
            <Select value={guests} onValueChange={setGuests}>
              <SelectTrigger className="w-full">
                <Users className="mr-2 h-4 w-4" />
                <SelectValue />
              </SelectTrigger>
              <SelectContent>
                <SelectItem value="1">1 Guest</SelectItem>
                <SelectItem value="2">2 Guests</SelectItem>
                <SelectItem value="3">3 Guests</SelectItem>
                <SelectItem value="4">4 Guests</SelectItem>
              </SelectContent>
            </Select>
          </div>

          {/* Submit Button */}
          <Button
            onClick={handleBooking}
            variant="gold"
            className="px-8"
          >
            Check Availability
          </Button>
        </div>
      </div>
    </div>
  );
};

export default BookingWidget;
