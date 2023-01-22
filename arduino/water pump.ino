#include <Adafruit_AHT10.h>

Adafruit_AHT10 aht;

#define RELAY_PIN 7 // ESP32 pin GIOP27, which connects to the IN pin of relay
// the setup function runs once when you press reset or power the board
void setup() {
  Serial.begin(9600);
  Serial.println("Adafruit AHT10 demo!");
  
   if (! aht.begin()) {
    Serial.println("Could not find AHT10? Check wiring");
    while (1) delay(10);
  }
  Serial.println("AHT10 found");
  // initialize digital pin GIOP27 as an output.
  pinMode(RELAY_PIN, OUTPUT);
}
// the loop function runs over and over again forever
void loop() {
  sensors_event_t humidity, temp;
  aht.getEvent(&humidity, &temp);// populate temp and humidity objects with fresh data
  Serial.print("Temperature: "); Serial.print(temp.temperature); Serial.println(" degrees C");
  Serial.print("Humidity: "); Serial.print(humidity.relative_humidity); Serial.println("% rH");
  
  if (humidity.relative_humidity > 30.50) {
  digitalWrite(RELAY_PIN, HIGH); // turn on pump 4 seconds
  Serial.print("on");
  delay(1000);
  digitalWrite(RELAY_PIN, LOW);  // turn off pump 4 seconds
  Serial.print("off ");
  delay(5000);
  }
}