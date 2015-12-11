
/*
  Projeto Agro Meteorology
  Ceará faz Ciência
  Sertão Central

  Desenvolverdor Felipe Alves;

*/
// Pino do sensor
int ldr = 0 ;

// Valor em tempo real do sendor LDR
int valorSensorLdr = 0  ;


void setup() {

// Iniciar servidor
Serial.begin(9600);

}

void loop() {

  valorSensorLdr = analogRead(ldr);
  Serial.println(valorSensorLdr);
  delay(1000);

}
