#include <stdio.h>

int main() {
    // three input value
    double num1 = 15;
    double num2 = 5;
    double num3 = 10;
    double average;

    // calculate average
    average = (num1 + num2 + num3) / 3.0;

    printf("The average of %.2lf, %.2lf, and %.2lf is: %.2lf\n", num1, num2, num3, average);

    return 0;
}