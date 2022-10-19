#include <iostream>
#include <cmath>
#include <vector>

using namespace std;

struct Flower
{
	double length;
	double width;
	int color;
};

double sigmoid(double value)
{
	return 1 / (1 + exp(-value));
}

double sigmoid_p(double value)
{
	return sigmoid(value) * (1 - sigmoid(value));
}

double nn(double length, double width, double w1, double w2, double b)
{
	return length * w1 + width * w2 + b;
}
int main()
{
	vector<Flower> flowers{ {3,1.5,1},
							{2,1,0},
							{4,1.5,1},
							{3,1,0},
							{3.5,0.5,1},
							{2,0.5,1},
							{5.5,1,1},
							{1,1,0} 
							};

	Flower unknomnFlower{ 4.5,1,-1 };

	double w1 = 1;
	double w2 = -1;
	double b = 0.5;

	for (int i = 0; i < 100; i++)
	{
		int rand_index = rand() % flowers.size();
		double nn_result =  sigmoid(nn(flowers[rand_index].length, flowers[rand_index].width, w1, w2, b));
		double expected_result = flowers[rand_index].color;

		double cost = pow((nn_result - expected_result), 2);

		double d_cost_pred = 2 * (nn_result - expected_result);

		double  d_pred_dz = sigmoid_p(nn_result);

		double dz_dw1 = flowers[rand_index].length;
		double dz_dw2 = flowers[rand_index].width;
		double dz_db = 1;

		double d_cost_dz = d_cost_pred * d_pred_dz;
		double dcost_dw1 = d_cost_dz * dz_dw1;
		double dcost_dw2 = d_cost_dz * dz_dw2;
		double dcost_db = d_cost_dz * dz_db;

		w1 = w1 - dcost_dw1 * 0.1;
		w2 = w2 - dcost_dw2 * 0.1;
		b = b - dcost_db * 0.1;

		cout << cost << endl;

	}
}

