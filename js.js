// function makePola(n){
//     for(let sharp1 = 0; sharp1 < n * 2 + 3; sharp1++){
//         if(sharp1 == 0 || sharp1 == n * 2 + 2){
//             for(let sharp = 0; sharp < n * 2 + 3; sharp++){
//                 process.stdout.write('#');
//             }
//         }else{
//             process.stdout.write('#');
//             const width = n * 2 + 1;
//             for(let x = 0; x < width; x++){
//                 if(x == sharp1-1 || x == width - sharp1){
//                     process.stdout.write('X');
//                 }else{
//                     process.stdout.write(' ');
//                 }
//             }
//             process.stdout.write('#');
//         }
//         console.log('')
//     }
// }


function makePola(n){
    const width = n * 2 + 3;

    console.log('#'.repeat(width));

    for (let i = 0; i < n * 2 + 1; i++) {
        const first = 1 + i;
        const second = width - 2 - i;

        let str = `#${' '.repeat(width - 2)}#`.split('');
        str[first] = 'X';
        str[second] = 'X';

        console.log(str.join(''));
    }

    console.log('#'.repeat(width));
}

makePola(5);