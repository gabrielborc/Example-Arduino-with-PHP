const int pinLed = 2;
int seqLog = 0; 

void setup() {
  Serial.begin(9600);
  pinMode(pinLed, OUTPUT);
}

void loop() {
  char comando;
  String strLog = "Comando ";
    
  if (Serial.available()) {    
    comando = Serial.read();
    seqLog += 1;
    strLog.concat(seqLog);
    strLog.concat(": ");
    
    if (comando == 'l') {
      digitalWrite(pinLed, HIGH);      
      strLog.concat(" Ligado");
      Serial.println(strLog);
    } else if (comando == 'd') {
      digitalWrite(pinLed, LOW);
      strLog.concat(" Desligado");
      Serial.println(strLog);
    } else {
      strLog.concat(" Desconhecido");
      Serial.println(strLog);
    }
  }
}
