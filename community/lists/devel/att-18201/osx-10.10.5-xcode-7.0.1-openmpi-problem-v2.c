#include <mpi.h>
#include <stdio.h>

#define COMM_DO(comm) if (comm != MPI_COMM_NULL) {int result; MPI_Comm_compare(MPI_COMM_SELF, comm, &result);}

int main (int argc, char **argv)
{
  MPI_Init (&argc, &argv);

  COMM_DO (MPI_COMM_SELF);

  MPI_Finalize ();

  return 0;
}


