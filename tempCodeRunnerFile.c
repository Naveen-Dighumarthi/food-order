#include<stdio.h>
#include<stdlib.h>
int x[10];
int place(int queeno,int i)
{
	for(int j=1;j<queeno;j++)
	{
		if(x[j]==i || abs(x[j]-i)==abs(j-queeno))
		{
			return 0;
		}
	}
	return 1;
}
void nqueen(int queeno,int n)
{
	for(int i=1;i<=n;i++)
	{
		if(place(queeno,i)==1)
		{
			x[queeno]=i;
			if(queeno==n)
			{
			   for (int i=0;i<n;i++)
			   {
			   	printf("%d",x[i]);
			   }
			}
			else
			{
				nqueen(queeno++,n);
			}
		}
	}
}
int main()
{
	int n,i=1;
	printf("enter no of queens");
	scanf("%d",&n);
	nqueen(i,n);
}