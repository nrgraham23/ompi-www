#include <mpi.h>
#include <stdio.h>

int main (int argc, char **argv)
{
  MPI_Init (&argc, &argv);

  if (MPI_COMM_NULL == MPI_COMM_SELF)
  {
    printf ("Equal (But this is not important)");
  }
  else
  {
    printf ("Not equal (But this is not important)");
  }

  MPI_Finalize ();

  return 0;
}


