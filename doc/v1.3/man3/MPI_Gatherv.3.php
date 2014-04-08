<?php
$topdir = "../../..";
$title = "MPI_Gatherv(3) man page (version 1.3.4)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
<PRE>
<!-- Manpage converted by man2html 3.0.1 -->

</PRE>
<H2>NAME</H2><PRE>
       <B>MPI_Gatherv</B> - Gathers varying amounts of data from all processes to the
       root process

</PRE>
<H2>SYNTAX</H2><PRE>

</PRE>
<H2>C Syntax</H2><PRE>
       #include &lt;mpi.h&gt;
       int MPI_Gatherv(void *<I>sendbuf</I>, int <I>sendcount</I>, MPI_Datatype <I>sendtype</I>,
            void <I>*recvbuf</I>, int <I>*recvcounts</I>, int <I>*displs</I>, MPI_Datatype <I>recvtype</I>,
            int <I>root</I>, MPI_Comm <I>comm</I>)

</PRE>
<H2>Fortran Syntax</H2><PRE>
       INCLUDE 'mpif.h'
       MPI_GATHERV(<I>SENDBUF,</I> <I>SENDCOUNT,</I> <I>SENDTYPE,</I> <I>RECVBUF,</I> <I>RECVCOUNTS,</I>
                 <I>DISPLS,</I> <I>RECVTYPE,</I> <I>ROOT,</I> <I>COMM,</I> <I>IERROR</I>)
            &lt;type&gt;    <I>SENDBUF(*),</I> <I>RECVBUF(*)</I>
            INTEGER   <I>SENDCOUNT,</I> <I>SENDTYPE,</I> <I>RECVCOUNTS(*),</I> <I>DISPLS(*)</I>
            INTEGER   <I>RECVTYPE,</I> <I>ROOT,</I> <I>COMM,</I> <I>IERROR</I>

</PRE>
<H2>C++ Syntax</H2><PRE>
       #include &lt;mpi.h&gt;
       void MPI::Comm::Gatherv(const void* <I>sendbuf</I>, int <I>sendcount</I>,
            const MPI::Datatype&amp; <I>sendtype</I>, void* <I>recvbuf</I>,
            const int <I>recvcounts</I>[], const int <I>displs</I>[],
            const MPI::Datatype&amp; <I>recvtype</I>, int <I>root</I>) const = 0

</PRE>
<H2>INPUT PARAMETERS</H2><PRE>
       sendbuf   Starting address of send buffer (choice).

       sendcount Number of elements in send buffer (integer).

       sendtype  Datatype of send buffer elements (handle).

       recvcounts
                 Integer array (of length group size) containing the number of
                 elements  that  are  received  from each process (significant
                 only at root).

       displs    Integer array (of length group size). Entry i  specifies  the
                 displacement relative to recvbuf at which to place the incom-
                 ing data from process i (significant only at root).

       recvtype  Datatype of recv buffer elements (significant only  at  root)
                 (handle).

       root      Rank of receiving process (integer).

       comm      Communicator (handle).

</PRE>
<H2>OUTPUT PARAMETERS</H2><PRE>
       recvbuf   Address of receive buffer (choice, significant only at root).

       IERROR    Fortran only: Error status (integer).
       The  outcome is as if each process, including the root process, sends a
       message to the root,

           <a href="../man3/MPI_Send.3.php">MPI_Send</a>(sendbuf, sendcount, sendtype, root, ...)

       and the root executes n receives,

           <a href="../man3/MPI_Recv.3.php">MPI_Recv</a>(recvbuf + disp[i] * extent(recvtype), \
                    recvcounts[i], recvtype, i, ...)

       Messages are placed in the receive buffer of the root process  in  rank
       order,  that is, the data sent from process j is placed in the jth por-
       tion of the receive buffer recvbuf on process root. The jth portion  of
       recvbuf begins at offset displs[j] elements (in terms of recvtype) into
       recvbuf.

       The receive buffer is ignored for all nonroot processes.

       The type signature implied by sendcount, sendtype on process i must  be
       equal  to  the type signature implied by recvcounts[i], recvtype at the
       root. This implies that the amount of data sent must be  equal  to  the
       amount  of  data  received, pairwise between each process and the root.
       Distinct type maps between sender and receiver are  still  allowed,  as
       illustrated in Example 2, below.

       All arguments to the function are significant on process root, while on
       other processes, only arguments  sendbuf,  sendcount,  sendtype,  root,
       comm  are  significant. The arguments root and comm must have identical
       values on all processes.

       The specification of counts, types, and displacements should not  cause
       any  location  on the root to be written more than once. Such a call is
       erroneous.

       <B>Example</B> <B>1:</B>  Now have each process send 100 ints to root, but place each
       set  (of  100)  stride ints apart at receiving end. Use MPI_Gatherv and
       the displs argument to achieve this effect. Assume stride &gt;= 100.

             MPI_Comm comm;
             int gsize,sendarray[100];
             int root, *rbuf, stride;
             int *displs,i,*rcounts;

         ...

             <a href="../man3/MPI_Comm_size.3.php">MPI_Comm_size</a>(comm, &amp;gsize);
             rbuf = (int *)malloc(gsize*stride*sizeof(int));
             displs = (int *)malloc(gsize*sizeof(int));
             rcounts = (int *)malloc(gsize*sizeof(int));
             for (i=0; i&lt;gsize; ++i) {
                 displs[i] = i*stride;
                 rcounts[i] = 100;
             }
             MPI_Gatherv(sendarray, 100, MPI_INT, rbuf, rcounts,
                         displs, MPI_INT, root, comm);

       Note that the program is erroneous if stride &lt; 100.

         ...

             <a href="../man3/MPI_Comm_size.3.php">MPI_Comm_size</a>(comm, &amp;gsize);
             rbuf = (int *)malloc(gsize*stride*sizeof(int));
             displs = (int *)malloc(gsize*sizeof(int));
             rcounts = (int *)malloc(gsize*sizeof(int));
             for (i=0; i&lt;gsize; ++i) {
                 displs[i] = i*stride;
                 rcounts[i] = 100;
             }
             /* Create datatype for 1 column of array
              */
             <a href="../man3/MPI_Type_vector.3.php">MPI_Type_vector</a>(100, 1, 150, MPI_INT, &amp;stype);
             <a href="../man3/MPI_Type_commit.3.php">MPI_Type_commit</a>( &amp;stype );
             MPI_Gatherv(sendarray, 1, stype, rbuf, rcounts,
                         displs, MPI_INT, root, comm);

       <B>Example</B>  <B>3:</B> Process i sends (100-i) ints from the ith column of a 100 x
       150 int array, in C. It is received into a buffer with  stride,  as  in
       the previous two examples.

             MPI_Comm comm;
             int gsize,sendarray[100][150],*sptr;
             int root, *rbuf, stride, myrank;
             MPI_Datatype stype;
             int *displs,i,*rcounts;

         ...

             <a href="../man3/MPI_Comm_size.3.php">MPI_Comm_size</a>(comm, &amp;gsize);
             <a href="../man3/MPI_Comm_rank.3.php">MPI_Comm_rank</a>( comm, &amp;myrank );
             rbuf = (int *)malloc(gsize*stride*sizeof(int));
             displs = (int *)malloc(gsize*sizeof(int));
             rcounts = (int *)malloc(gsize*sizeof(int));
             for (i=0; i&lt;gsize; ++i) {
                 displs[i] = i*stride;
                 rcounts[i] = 100-i;  /* note change from previous example */
             }
             /* Create datatype for the column we are sending
              */
             <a href="../man3/MPI_Type_vector.3.php">MPI_Type_vector</a>(100-myrank, 1, 150, MPI_INT, &amp;stype);
             <a href="../man3/MPI_Type_commit.3.php">MPI_Type_commit</a>( &amp;stype );
             /* sptr is the address of start of "myrank" column
              */
             sptr = &amp;sendarray[0][myrank];
             MPI_Gatherv(sptr, 1, stype, rbuf, rcounts, displs, MPI_INT,
                root, comm);

       Note that a different amount of data is received from each process.

       <B>Example</B>  <B>4:</B> Same as Example 3, but done in a different way at the send-
       ing end. We create a datatype that causes the correct striding  at  the
       sending end so that we read a column of a C array.

             MPI_Comm comm;
             int gsize,sendarray[100][150],*sptr;
             int root, *rbuf, stride, myrank, disp[2], blocklen[2];
             displs = (int *)malloc(gsize*sizeof(int));
             rcounts = (int *)malloc(gsize*sizeof(int));
             for (i=0; i&lt;gsize; ++i) {
                 displs[i] = i*stride;
                 rcounts[i] = 100-i;
             }
             /* Create datatype for one int, with extent of entire row
              */
             disp[0] = 0;       disp[1] = 150*sizeof(int);
             type[0] = MPI_INT; type[1] = MPI_UB;
             blocklen[0] = 1;   blocklen[1] = 1;
             <a href="../man3/MPI_Type_struct.3.php">MPI_Type_struct</a>( 2, blocklen, disp, type, &amp;stype );
             <a href="../man3/MPI_Type_commit.3.php">MPI_Type_commit</a>( &amp;stype );
             sptr = &amp;sendarray[0][myrank];
             MPI_Gatherv(sptr, 100-myrank, stype, rbuf, rcounts,
                         displs, MPI_INT, root, comm);

       <B>Example</B>  <B>5:</B> Same as Example 3 at sending side, but at receiving side we
       make the  stride between received blocks vary from block to block.

             MPI_Comm comm;
             int gsize,sendarray[100][150],*sptr;
             int root, *rbuf, *stride, myrank, bufsize;
             MPI_Datatype stype;
             int *displs,i,*rcounts,offset;

         ...

             <a href="../man3/MPI_Comm_size.3.php">MPI_Comm_size</a>( comm, &amp;gsize);
             <a href="../man3/MPI_Comm_rank.3.php">MPI_Comm_rank</a>( comm, &amp;myrank );

         stride = (int *)malloc(gsize*sizeof(int));
            ...
             /* stride[i] for i = 0 to gsize-1 is set somehow
              */
         /* set up displs and rcounts vectors first
              */
             displs = (int *)malloc(gsize*sizeof(int));
             rcounts = (int *)malloc(gsize*sizeof(int));
             offset = 0;
             for (i=0; i&lt;gsize; ++i) {
                 displs[i] = offset;
                 offset += stride[i];
                 rcounts[i] = 100-i;
             }
             /* the required buffer size for rbuf is now easily obtained
              */
             bufsize = displs[gsize-1]+rcounts[gsize-1];
             rbuf = (int *)malloc(bufsize*sizeof(int));
             /* Create datatype for the column we are sending
              */
             <a href="../man3/MPI_Type_vector.3.php">MPI_Type_vector</a>(100-myrank, 1, 150, MPI_INT, &amp;stype);
             <a href="../man3/MPI_Type_commit.3.php">MPI_Type_commit</a>( &amp;stype );
             sptr = &amp;sendarray[0][myrank];
             MPI_Gatherv(sptr, 1, stype, rbuf, rcounts,
                         displs, MPI_INT, root, comm);

       <B>Example</B> <B>6:</B> Process i sends num ints from the ith column of a 100 x  150
             int *displs,i,*rcounts,num;

         ...

             <a href="../man3/MPI_Comm_size.3.php">MPI_Comm_size</a>( comm, &amp;gsize);
             <a href="../man3/MPI_Comm_rank.3.php">MPI_Comm_rank</a>( comm, &amp;myrank );

         /* First, gather nums to root
              */
             rcounts = (int *)malloc(gsize*sizeof(int));
             <a href="../man3/MPI_Gather.3.php">MPI_Gather</a>( &amp;num, 1, MPI_INT, rcounts, 1, MPI_INT, root, comm);
             /* root now has correct rcounts, using these we set
              * displs[] so that data is placed contiguously (or
              * concatenated) at receive end
              */
             displs = (int *)malloc(gsize*sizeof(int));
             displs[0] = 0;
             for (i=1; i&lt;gsize; ++i) {
                 displs[i] = displs[i-1]+rcounts[i-1];
             }
             /* And, create receive buffer
              */
             rbuf = (int *)malloc(gsize*(displs[gsize-1]+rcounts[gsize-1])
                     *sizeof(int));
             /* Create datatype for one int, with extent of entire row
              */
             disp[0] = 0;       disp[1] = 150*sizeof(int);
             type[0] = MPI_INT; type[1] = MPI_UB;
             blocklen[0] = 1;   blocklen[1] = 1;
             <a href="../man3/MPI_Type_struct.3.php">MPI_Type_struct</a>( 2, blocklen, disp, type, &amp;stype );
             <a href="../man3/MPI_Type_commit.3.php">MPI_Type_commit</a>( &amp;stype );
             sptr = &amp;sendarray[0][myrank];
             MPI_Gatherv(sptr, num, stype, rbuf, rcounts,
                         displs, MPI_INT, root, comm);

</PRE>
<H2>USE OF IN-PLACE OPTION</H2><PRE>
       The in-place option operates in the same way as it does for <a href="../man3/MPI_Gather.3.php">MPI_Gather</a>.
       When the communicator is an intracommunicator, you can perform a gather
       operation  in-place  (the  output  buffer is used as the input buffer).
       Use the variable MPI_IN_PLACE as the value of the root process <I>sendbuf</I>.
       In  this case, <I>sendcount</I> and <I>sendtype</I> are ignored, and the contribution
       of the root process to the gathered vector is assumed to already be  in
       the correct place in the receive buffer.

       Note  that  MPI_IN_PLACE  is  a  special kind of value; it has the same
       restrictions on its use as MPI_BOTTOM.

       Because the in-place option converts the receive buffer  into  a  send-
       and-receive  buffer,  a  Fortran binding that includes INTENT must mark
       these as INOUT, not OUT.

</PRE>
<H2>WHEN COMMUNICATOR IS AN INTER-COMMUNICATOR</H2><PRE>
       When the communicator is an inter-communicator, the root process in the
       first  group  gathers  data from all the processes in the second group.
       The first group defines the root process.  That process  uses  MPI_ROOT
       as  the  value  of  its  <I>root</I>  argument.   The  remaining processes use
       MPI_PROC_NULL as the value of their <I>root</I> argument.   All  processes  in
       Almost all MPI routines return an error value; C routines as the  value
       of  the  function  and Fortran routines in the last argument. C++ func-
       tions do not return errors. If the default  error  handler  is  set  to
       MPI::ERRORS_THROW_EXCEPTIONS, then on error the C++ exception mechanism
       will be used to throw an MPI:Exception object.

       Before the error value is returned, the current MPI  error  handler  is
       called.  By  default, this error handler aborts the MPI job, except for
       I/O  function  errors.  The  error  handler   may   be   changed   with
       <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the predefined error handler MPI_ERRORS_RETURN
       may be used to cause error values to be returned. Note  that  MPI  does
       not guarantee that an MPI program can continue past an error.

</PRE>
<H2>SEE ALSO</H2><PRE>
       <a href="../man3/MPI_Gather.3.php">MPI_Gather</a>
       <a href="../man3/MPI_Scatter.3.php">MPI_Scatter</a>
       <a href="../man3/MPI_Scatterv.3.php">MPI_Scatterv</a>

1.3.4                            Nov 11, 2009                   <B>MPI_Gatherv(3)</B>
</PRE>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
